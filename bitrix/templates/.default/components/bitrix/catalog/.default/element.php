<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!CModule::IncludeModule("iblock"))
	return;

global $APPLICATION;
if (isset($_REQUEST["TRADEMARK"]))
{
	$APPLICATION->AddChainItem("Торговые марки","/manufacturers/");
	$rsTrademark = CIBlockElement::GetByID($_REQUEST["TRADEMARK"]);
	if ($arTrademark = $rsTrademark->GetNext())
{
	$APPLICATION->AddChainItem($arTrademark["NAME"],$arTrademark["DETAIL_PAGE_URL"]);
}
}

$secName = false;
$parentSecCode = false;
$arParentSection = false;

$arFilter = array(
	"IBLOCK_ID" => $arParams["IBLOCK_ID"],
	"CODE" => $arResult["VARIABLES"]["SECTION_CODE"]);

$db_list = CIBlockSection::GetList(Array(), $arFilter);
if ($arSection = $db_list->GetNext())
{
    $secName = $arSection["NAME"];
    if (intval($arSection["IBLOCK_SECTION_ID"])>0)
    {
        $res = CIBlockSection::GetByID($arSection["IBLOCK_SECTION_ID"]);
        if($arParentSection = $res->GetNext()) {
            $parentSecCode = $arParentSection["~CODE"];
        }
    }
}
?>
<?
global $arrFilterSectionList;
$arrFilterSectionList = array();
if (isset($_REQUEST["TRADEMARK"]))
{
$arrFilterSectionList = array("PROPERTY"=>array("TRADEMARK"=>$_REQUEST["TRADEMARK"]));
}
?>
<?$APPLICATION->IncludeComponent(
	"solomon:catalog.section.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $parentSecCode?$parentSecCode:$arResult["VARIABLES"]["SECTION_CODE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"ADD_SECTIONS_CHAIN" => "N",
		"SELECTED_SECTION" => $arResult["VARIABLES"]["SECTION_CODE"],
		"FILTER_NAME" => "arrFilterSectionList",
	),
	$component
);?>
<?$ElementID=$APPLICATION->IncludeComponent(
	"bitrix:catalog.element",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"PROPERTY_CODE" => $arParams["DETAIL_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["DETAIL_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["DETAIL_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["DETAIL_BROWSER_TITLE"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"PRICE_VAT_SHOW_VALUE" => $arParams["PRICE_VAT_SHOW_VALUE"],
		"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],
		"LINK_IBLOCK_TYPE" => $arParams["LINK_IBLOCK_TYPE"],
		"LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
		"LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
		"LINK_ELEMENTS_URL" => $arParams["LINK_ELEMENTS_URL"],

		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["DETAIL_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["DETAIL_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],

		"ELEMENT_ID" => $arResult["VARIABLES"]["ELEMENT_ID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],
		'USE_ELEMENT_COUNTER' => $arParams['USE_ELEMENT_COUNTER'],

		'RESIZE_PREVIEW' => $arParams['RESIZE_PREVIEW'],
		'RESIZE_PREVIEW_WIDTH' => $arParams['RESIZE_PREVIEW_WIDTH'],
		'RESIZE_PREVIEW_HEIGHT' => $arParams['RESIZE_PREVIEW_HEIGHT'],
		'GET_DETAIL_PICTURE' => $arParams['GET_DETAIL_PICTURE'],
	),
	$component
);?>
<?if($arParams["USE_REVIEW"]=="Y" && IsModuleInstalled("forum") && $ElementID):?>
<br />
<?$APPLICATION->IncludeComponent(
	"bitrix:forum.topic.reviews",
	"",
	Array(
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"MESSAGES_PER_PAGE" => $arParams["MESSAGES_PER_PAGE"],
		"USE_CAPTCHA" => $arParams["USE_CAPTCHA"],
		"PATH_TO_SMILE" => $arParams["PATH_TO_SMILE"],
		"FORUM_ID" => $arParams["FORUM_ID"],
		"URL_TEMPLATES_READ" => $arParams["URL_TEMPLATES_READ"],
		"SHOW_LINK_TO_FORUM" => $arParams["SHOW_LINK_TO_FORUM"],
		"ELEMENT_ID" => $ElementID,
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"AJAX_POST" => $arParams["REVIEW_AJAX_POST"],
		"POST_FIRST_MESSAGE" => $arParams["POST_FIRST_MESSAGE"],
		"URL_TEMPLATES_DETAIL" => $arParams["POST_FIRST_MESSAGE"]==="Y"? $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"] :"",
	),
	$component
);?>
<?endif?>
<?if($arParams["USE_ALSO_BUY"] == "Y" && IsModuleInstalled("sale") && $ElementID):?>

<?$APPLICATION->IncludeComponent("bitrix:sale.recommended.products", ".default", array(
	"ID" => $ElementID,
	"MIN_BUYES" => $arParams["ALSO_BUY_MIN_BUYES"],
	"ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
	"LINE_ELEMENT_COUNT" => $arParams["ALSO_BUY_ELEMENT_COUNT"],
	"DETAIL_URL" => $arParams["DETAIL_URL"],
	"BASKET_URL" => $arParams["BASKET_URL"],
	"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
	"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
	"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
	"CACHE_TYPE" => $arParams["CACHE_TYPE"],
	"CACHE_TIME" => $arParams["CACHE_TIME"],
	"PRICE_CODE" => $arParams["PRICE_CODE"],
	"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
	"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],
	"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
	'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
	'CURRENCY_ID' => $arParams['CURRENCY_ID'],
	),
	$component
);

?>
<?endif?>
<?if($arParams["USE_STORE"] == "Y" && IsModuleInstalled("catalog") && $ElementID):?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.store.amount", ".default", array(
		"PER_PAGE" => "10",
		"USE_STORE_PHONE" => $arParams["USE_STORE_PHONE"],
		"SCHEDULE" => $arParams["USE_STORE_SCHEDULE"],
		"USE_MIN_AMOUNT" => $arParams["USE_MIN_AMOUNT"],
		"MIN_AMOUNT" => $arParams["MIN_AMOUNT"],
		"ELEMENT_ID" => $ElementID,
		"STORE_PATH"  =>  $arParams["STORE_PATH"],
		"MAIN_TITLE"  =>  $arParams["MAIN_TITLE"],
	),
	$component
);?>
<?endif?>