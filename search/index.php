<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("");
?>
<?$APPLICATION->IncludeComponent("bitrix:catalog.search", ".default", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "6",
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"PAGE_ELEMENT_COUNT" => "30",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"OFFERS_LIMIT" => "5",
	"SECTION_URL" => "/catalog/#CODE#/",
	"DETAIL_URL" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"DISPLAY_COMPARE" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "Y",
	"CONVERT_CURRENCY" => "N",
	"RESTART" => "N",
	"NO_WORD_LOGIC" => "N",
	"USE_LANGUAGE_GUESS" => "Y",
	"CHECK_DATES" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "N",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"RESIZE_PREVIEW" => "Y",
	"RESIZE_PREVIEW_WIDTH" => "198",
	"RESIZE_PREVIEW_HEIGHT" => "220",
	"GET_DETAIL_PICTURE" => "Y",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?> 
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>