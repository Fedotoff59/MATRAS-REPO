<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if (!CModule::IncludeModule("iblock"))
	return;

global $APPLICATION;
if (isset($_REQUEST["TRADEMARK"]))
{
	$APPLICATION->AddChainItem("�������� �����","/manufacturers/");
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
    <?if ($secName):?><h1><?=$arParentSection?$arParentSection["NAME"]:$secName?></h1><?endif;?>
<div class="catalog">
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
//		"CACHE_TYPE" => "N",	
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"COUNT_ELEMENTS" => $arParams["SECTION_COUNT_ELEMENTS"],
		"TOP_DEPTH" => $arParams["SECTION_TOP_DEPTH"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"FILTER_NAME" => "arrFilterSectionList",
	),
	$component
);?>
<?
if ($parentSecCode)
{
        $APPLICATION->AddChainItem($arSection["NAME"],$arSection["SECTION_PAGE_URL"],false);
}
?>
<?if ($arParentSection):?><h3><?=$secName?></h3><?endif;?>
<?$APPLICATION->IncludeComponent(
	"bitrix:catalog.section",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"ELEMENT_SORT_FIELD" => $arParams["ELEMENT_SORT_FIELD"],
		"ELEMENT_SORT_ORDER" => $arParams["ELEMENT_SORT_ORDER"],
		"PROPERTY_CODE" => $arParams["LIST_PROPERTY_CODE"],
		"META_KEYWORDS" => $arParams["LIST_META_KEYWORDS"],
		"META_DESCRIPTION" => $arParams["LIST_META_DESCRIPTION"],
		"BROWSER_TITLE" => $arParams["LIST_BROWSER_TITLE"],
		"INCLUDE_SUBSECTIONS" => $arParams["INCLUDE_SUBSECTIONS"],
		"BASKET_URL" => $arParams["BASKET_URL"],
		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],
		"PRODUCT_PROPS_VARIABLE" => $arParams["PRODUCT_PROPS_VARIABLE"],
		"FILTER_NAME" => $arParams["FILTER_NAME"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_FILTER" => $arParams["CACHE_FILTER"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],
		"SET_TITLE" => $arParams["SET_TITLE"],
		"SET_STATUS_404" => $arParams["SET_STATUS_404"],
		"DISPLAY_COMPARE" => $arParams["USE_COMPARE"],
		"PAGE_ELEMENT_COUNT" => $arParams["PAGE_ELEMENT_COUNT"],
		"LINE_ELEMENT_COUNT" => $arParams["LINE_ELEMENT_COUNT"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"USE_PRICE_COUNT" => $arParams["USE_PRICE_COUNT"],
		"SHOW_PRICE_COUNT" => $arParams["SHOW_PRICE_COUNT"],

		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],
		"USE_PRODUCT_QUANTITY" => $arParams['USE_PRODUCT_QUANTITY'],
		"PRODUCT_PROPERTIES" => $arParams["PRODUCT_PROPERTIES"],

		"DISPLAY_TOP_PAGER" => $arParams["DISPLAY_TOP_PAGER"],
		"DISPLAY_BOTTOM_PAGER" => $arParams["DISPLAY_BOTTOM_PAGER"],
		"PAGER_TITLE" => $arParams["PAGER_TITLE"],
		"PAGER_SHOW_ALWAYS" => $arParams["PAGER_SHOW_ALWAYS"],
		"PAGER_TEMPLATE" => $arParams["PAGER_TEMPLATE"],
		"PAGER_DESC_NUMBERING" => $arParams["PAGER_DESC_NUMBERING"],
		"PAGER_DESC_NUMBERING_CACHE_TIME" => $arParams["PAGER_DESC_NUMBERING_CACHE_TIME"],
		"PAGER_SHOW_ALL" => $arParams["PAGER_SHOW_ALL"],

		"OFFERS_CART_PROPERTIES" => $arParams["OFFERS_CART_PROPERTIES"],
		"OFFERS_FIELD_CODE" => $arParams["LIST_OFFERS_FIELD_CODE"],
		"OFFERS_PROPERTY_CODE" => $arParams["LIST_OFFERS_PROPERTY_CODE"],
		"OFFERS_SORT_FIELD" => $arParams["OFFERS_SORT_FIELD"],
		"OFFERS_SORT_ORDER" => $arParams["OFFERS_SORT_ORDER"],
		"OFFERS_LIMIT" => $arParams["LIST_OFFERS_LIMIT"],

		"SECTION_ID" => $arResult["VARIABLES"]["SECTION_ID"],
		"SECTION_CODE" => $arResult["VARIABLES"]["SECTION_CODE"],
		"SECTION_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["section"],
		"DETAIL_URL" => $arResult["FOLDER"].$arResult["URL_TEMPLATES"]["element"],
		'CONVERT_CURRENCY' => $arParams['CONVERT_CURRENCY'],
		'CURRENCY_ID' => $arParams['CURRENCY_ID'],

		'RESIZE_PREVIEW' => $arParams['RESIZE_PREVIEW'],
		'RESIZE_PREVIEW_WIDTH' => $arParams['RESIZE_PREVIEW_WIDTH'],
		'RESIZE_PREVIEW_HEIGHT' => $arParams['RESIZE_PREVIEW_HEIGHT'],
		'GET_DETAIL_PICTURE' => $arParams['GET_DETAIL_PICTURE'],
	),
	$component
);
?>
</div><!-- .catalog -->