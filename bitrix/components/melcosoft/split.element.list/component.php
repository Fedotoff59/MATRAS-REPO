<?

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true)
    die();

if (!isset($arParams["CACHE_TIME"]))
    $arParams["CACHE_TIME"] = 300;

$arParams["IBLOCK_TYPE"] = trim($arParams["IBLOCK_TYPE"]);
if (strlen($arParams["IBLOCK_TYPE"]) <= 0)
    $arParams["IBLOCK_TYPE"] = "news";
if ($arParams["IBLOCK_TYPE"] == "-")
    $arParams["IBLOCK_TYPE"] = "";

if (!is_array($arParams["IBLOCKS"]))
    $arParams["IBLOCKS"] = array($arParams["IBLOCKS"]);
foreach ($arParams["IBLOCKS"] as $k => $v)
    if (!$v)
        unset($arParams["IBLOCKS"][$k]);

/*************************************************************************
			Processing of the Buy link
*************************************************************************/
$strError = "";
if (array_key_exists($arParams["ACTION_VARIABLE"], $_REQUEST) && array_key_exists($arParams["PRODUCT_ID_VARIABLE"], $_REQUEST))
{
	if(array_key_exists($arParams["ACTION_VARIABLE"]."BUY", $_REQUEST))
		$action = "BUY";
	elseif(array_key_exists($arParams["ACTION_VARIABLE"]."ADD2BASKET", $_REQUEST))
		$action = "ADD2BASKET";
	else
		$action = strtoupper($_REQUEST[$arParams["ACTION_VARIABLE"]]);

	$productID = intval($_REQUEST[$arParams["PRODUCT_ID_VARIABLE"]]);
	if(($action == "ADD2BASKET" || $action == "BUY" || $action == "SUBSCRIBE_PRODUCT") && $productID > 0)
	{
		if(CModule::IncludeModule("iblock") && CModule::IncludeModule("sale") && CModule::IncludeModule("catalog"))
		{
			if($arParams["USE_PRODUCT_QUANTITY"])
				$QUANTITY = intval($_REQUEST[$arParams["PRODUCT_QUANTITY_VARIABLE"]]);
			if($QUANTITY <= 1)
				$QUANTITY = 1;

			$product_properties = array();

			$rsItems = CIBlockElement::GetList(array(), array('ID' => $productID, 'ACTIVE' => 'Y'), false, false, array('ID', 'IBLOCK_ID'));
			if ($arItem = $rsItems->Fetch())
			{
				$arItem['IBLOCK_ID'] = intval($arItem['IBLOCK_ID']);
				if ($arItem['IBLOCK_ID'] == $arParams["IBLOCK_ID"])
				{
					if (!empty($arParams["PRODUCT_PROPERTIES"]))
					{
						if (
							array_key_exists($arParams["PRODUCT_PROPS_VARIABLE"], $_REQUEST)
							&& is_array($_REQUEST[$arParams["PRODUCT_PROPS_VARIABLE"]])
						)
						{
							$product_properties = CIBlockPriceTools::CheckProductProperties(
								$arParams["IBLOCK_ID"],
								$productID,
								$arParams["PRODUCT_PROPERTIES"],
								$_REQUEST[$arParams["PRODUCT_PROPS_VARIABLE"]]
							);
							if (!is_array($product_properties))
								$strError = GetMessage("CATALOG_ERROR2BASKET").".";
						}
						else
						{
							$strError = GetMessage("CATALOG_ERROR2BASKET").".";
						}
					}
				}
				else
				{
					if (!empty($arParams["OFFERS_CART_PROPERTIES"]))
					{
						$product_properties = CIBlockPriceTools::GetOfferProperties(
							$productID,
							$arParams["IBLOCK_ID"],
							$arParams["OFFERS_CART_PROPERTIES"]
						);
					}
				}
			}
			else
			{
				$strError = GetMessage('CATALOG_PRODUCT_NOT_FOUND').".";
			}

			$notifyOption = COption::GetOptionString("sale", "subscribe_prod", "");
			$arNotify = unserialize($notifyOption);

			if ($action == "SUBSCRIBE_PRODUCT" && $arNotify[SITE_ID]['use'] == 'Y')
			{
				$arRewriteFields["SUBSCRIBE"] = "Y";
				$arRewriteFields["CAN_BUY"] = "N";
			}

			if(!$strError && Add2BasketByProductID($productID, $QUANTITY, $arRewriteFields, $product_properties))
			{
				if($action == "BUY")
					LocalRedirect($arParams["BASKET_URL"]);
				else
					LocalRedirect($APPLICATION->GetCurPageParam("", array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
			}
			else
			{
				if($ex = $GLOBALS["APPLICATION"]->GetException())
					$strError = $ex->GetString();
				else
					$strError = GetMessage("CATALOG_ERROR2BASKET").".";
			}
		}
	}
}
if(strlen($strError)>0)
{
	ShowError($strError);
	return;
}
    

$arFilter = array(
    "IBLOCK_ID" => $arParams["IBLOCK_ID"],
    "CODE" => $arParams["ELEMENT_CODE"],
    "ACITVE" => "Y",
);

if ($this->StartResultCache(false, array($arParams["CACHE_GROUPS"] === "N" ? false : $USER->GetGroups(), $arFilter))) {
    if (!CModule::IncludeModule("iblock")) {
        $this->AbortResultCache();
        ShowError(GetMessage("IBLOCK_MODULE_NOT_INSTALLED"));
        return;
    }

    if (!CModule::IncludeModule("catalog")) {
        $this->AbortResultCache();
        ShowError("Catalog not installed");
        return;
    }

    $dbIBlock = CIBlock::GetByID($arParams["IBLOCK_ID"]);
    if (!$arIBlock = $dbIBlock->GetNext()) {
        $this->AbortResultCache();
        ShowError("IBLOCK not found");
        return;
    }

    $dbElement = CIBlockElement::GetList(array(), $arFilter);
    if (!$arElement = $dbElement->GetNext()) {
        $this->AbortResultCache();
        ShowError("Element not found");
        @define("ERROR_404", "Y");
        if ($arParams["SET_STATUS_404"] === "Y")
            CHTTP::SetStatus("404 Not Found");
        return;
    }

    /*
     * 
     */

    $arFilter = array(
        "IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
        "PROPERTY" => array($arParams["LINK_PROPERTY_SID"] => $arElement["ID"]),
        "ELEMENT_SUBSECTIONS" => "N",
	"ACTIVE" => "Y",
    );

    $res = CIBlockSection::GetList(array("SORT" => "ASC"), $arFilter, true);

    $arSections = array();
    while ($arFields = $res->GetNext()) {
        $arFields["ITEMS"] = array();
        $arSections[$arFields["ID"]] = $arFields;
    }
    
    $arPrices = CIBlockPriceTools::GetCatalogPrices($arParams["LINK_IBLOCK_ID"], $arParams["PRICE_CODE"]);
    $arConvertParams = array();
    
    
	$arSelect = array(
		"ID",
		"IBLOCK_ID",
		"CODE",
		"XML_ID",
		"NAME",
		"ACTIVE",
		"DATE_ACTIVE_FROM",
		"DATE_ACTIVE_TO",
		"SORT",
		"PREVIEW_TEXT",
		"PREVIEW_TEXT_TYPE",
		"DETAIL_TEXT",
		"DETAIL_TEXT_TYPE",
		"DATE_CREATE",
		"CREATED_BY",
		"TIMESTAMP_X",
		"MODIFIED_BY",
		"TAGS",
		"IBLOCK_SECTION_ID",
		"DETAIL_PAGE_URL",
		"DETAIL_PICTURE",
		"PREVIEW_PICTURE",
		"PROPERTY_*",
	);

    foreach ($arPrices as &$value) {
        $arSelect[] = $value["SELECT"];
        //$arFilter["CATALOG_SHOP_QUANTITY_" . $value["ID"]] = $arParams["SHOW_PRICE_COUNT"];
    }

    $arFilter = array(
        "IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
	"ACTIVE" => "Y",
        "PROPERTY_" . $arParams["LINK_PROPERTY_SID"] => $arElement["ID"],
    );
    
    $res = CIBlockElement::GetList(array("SORT" => "ASC"), $arFilter, false, false, $arSelect);
    while ($obElement = $res->GetNextElement()) {
        $arFields = $obElement->GetFields();
        $arFields["PROPERTIES"] = $obElement->GetProperties();

        $arFields["PRICES"] = CIBlockPriceTools::GetItemPrices($arParams["LINK_IBLOCK_ID"], $arPrices, $arFields, $arParams['PRICE_VAT_INCLUDE'], $arConvertParams);
        //print_r($arFields);

        if (intval($arFields["PREVIEW_PICTURE"]) > 0)
            $arFields["PREVIEW_PICTURE"] = CFile::GetFileArray($arFields["PREVIEW_PICTURE"]);
        if (intval($arFields["DETAIL_PICTURE"]) > 0)
            $arFields["DETAIL_PICTURE"] = CFile::GetFileArray($arFields["DETAIL_PICTURE"]);

        if (!isset($arSections[$arFields["IBLOCK_SECTION_ID"]])) {
            $this->AbortResultCache();
            ShowError("Component error");
            return;
        }

        $arSections[$arFields["IBLOCK_SECTION_ID"]]["ITEMS"][] = $arFields;
    }

    $arResult = array(
        "IBLOCK_ID" => $arParams["IBLOCK_ID"],
        "IBLOCK_NAME" => $arIBlock["NAME"],
        "LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
        "ELEMENT" => $arElement,
        "LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
        "SECTIONS" => $arSections,
    );

    $this->SetResultCacheKeys(array(
        "IBLOCK_ID",
        "IBLOCK_NAME",
        "LINK_IBLOCK_ID",
        "ELEMENT",
        "LINK_PROPERTY_SID",
    ));
    $this->IncludeComponentTemplate();
}

$APPLICATION->AddChainItem(
        $arResult["IBLOCK_NAME"], $arParams["IBLOCK_URL"]);

$APPLICATION->AddChainItem(
        $arResult["ELEMENT"]["NAME"], $arParams["IBLOCK_URL"] . $arResult["ELEMENT"]["CODE"] . "/");
/*
  [IBLOCK_TYPE] => catalog
  [IBLOCK_ID] => 7
  [LINK_IBLOCK_TYPE] => catalog
  [LINK_IBLOCK_ID] => 6
  [LINK_PROPERTY_SID] => TRADEMARK
  [ELEMENT_CODE] => penopleks
  [CACHE_TYPE] => A
  [CACHE_TIME] => 36000000
  [CACHE_GROUPS] => Y
  [~IBLOCK_TYPE] => catalog
  [~IBLOCK_ID] => 7
  [~LINK_IBLOCK_TYPE] => catalog
  [~LINK_IBLOCK_ID] => 6
  [~LINK_PROPERTY_SID] => TRADEMARK
  [~ELEMENT_CODE] => penopleks
  [~CACHE_TYPE] => A
  [~CACHE_TIME] => 36000000
  [~CACHE_GROUPS] => Y
  [IBLOCKS] => Array
  (
  )
 */
?>
 
