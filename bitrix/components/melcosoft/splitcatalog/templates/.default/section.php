<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?$APPLICATION->IncludeComponent(
	"melcosoft:split.element.list",
	"",
	Array(
		"IBLOCK_TYPE" => $arParams["IBLOCK_TYPE"],
		"IBLOCK_ID" => $arParams["IBLOCK_ID"],
		"LINK_IBLOCK_TYPE" => $arParams["LINK_IBLOCK_TYPE"],
		"LINK_IBLOCK_ID" => $arParams["LINK_IBLOCK_ID"],
		"LINK_PROPERTY_SID" => $arParams["LINK_PROPERTY_SID"],
		"ELEMENT_CODE" => $arResult["VARIABLES"]["ELEMENT_CODE"],
		"IBLOCK_URL" => $arParams["SEF_FOLDER"],
		"CACHE_TYPE" => $arParams["CACHE_TYPE"],
		"CACHE_TIME" => $arParams["CACHE_TIME"],
		"CACHE_GROUPS" => $arParams["CACHE_GROUPS"],

		"USE_PRODUCT_QUANTITY" => $arParams["USE_PRODUCT_QUANTITY"],
		"PRICE_CODE" => $arParams["PRICE_CODE"],
		"PRICE_VAT_INCLUDE" => $arParams["PRICE_VAT_INCLUDE"],

		"ACTION_VARIABLE" => $arParams["ACTION_VARIABLE"],
		"PRODUCT_ID_VARIABLE" => $arParams["PRODUCT_ID_VARIABLE"],
		"SECTION_ID_VARIABLE" => $arParams["SECTION_ID_VARIABLE"],
		"PRODUCT_QUANTITY_VARIABLE" => $arParams["PRODUCT_QUANTITY_VARIABLE"],

		'RESIZE_PREVIEW' => $arParams['RESIZE_PREVIEW'],
		'RESIZE_PREVIEW_WIDTH' => $arParams['RESIZE_PREVIEW_WIDTH'],
		'RESIZE_PREVIEW_HEIGHT' => $arParams['RESIZE_PREVIEW_HEIGHT'],
		'GET_DETAIL_PICTURE' => $arParams['GET_DETAIL_PICTURE'],
	),
	$component
);?>
