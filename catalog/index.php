<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
<div id="sidebar">
<?$APPLICATION->IncludeFile(
    "/include/left_sidebar.php",
    Array(),
    Array("MODE"=>"text","NAME"=>"Левая колонка")
);?>
</div><!-- #sidebar -->

        
	
	
    <?
    if(isset($_GET['CATALOGFILTER']) && $_GET['CATALOGFILTER'] == 'Y'):
    /** START SMART FILTER  **/
    global $arSmartFilter;
    // Start matrebasefilter
    if(isset($_POST['matrebase']) && ($_POST['matrebase'] != 'Не важно')) {
        $arSmartFilter['PROPERTY']['MATREBASE_VALUE'] = $_POST['matrebase'];
    }
    // Start Brand Filter
    $arBFilter = Array('IBLOCK_ID' => 7, 'ACTIVE'=>'Y');
    $db_list = CIBlockSection::GetList(false, $arBFilter, true);
    while($ar_trademarks = $db_list->GetNext())
    {
        $TID = $ar_trademarks["ID"];
        if(isset($_POST['brand_'.$TID]) && $_POST['brand_'.$TID] == 'on')
            $arBrandFilter[] = $TID;
    }
    $arSmartFilter['PROPERTY']['TRADEMARK'] = $arBrandFilter;
    /** END SMART FILTER  **/
    endif;
    ?>
	
    <?$APPLICATION->IncludeComponent("bitrix:catalog", ".default", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "6",
	"BASKET_URL" => "/personal/cart/",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/catalog/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "Y",
	"USE_ELEMENT_COUNTER" => "Y",
	"USE_FILTER" => "Y",
	"FILTER_NAME" => "arSmartFilter",
	"FILTER_FIELD_CODE" => array(
		0 => "ID",
		1 => "",
	),
	"FILTER_PROPERTY_CODE" => array(
		0 => "TRADEMARK",
		1 => "MATREBASE",
		2 => "",
	),
	"FILTER_PRICE_CODE" => array(
	),
	"FILTER_OFFERS_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"FILTER_OFFERS_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"USE_REVIEW" => "N",
	"USE_COMPARE" => "Y",
	"COMPARE_NAME" => "CATALOG_COMPARE_LIST",
	"COMPARE_FIELD_CODE" => array(
		0 => "ID",
		1 => "NAME",
		2 => "PREVIEW_TEXT",
		3 => "PREVIEW_PICTURE",
		4 => "DETAIL_TEXT",
		5 => "SHOW_COUNTER",
		6 => "",
	),
	"COMPARE_PROPERTY_CODE" => array(
		0 => "TRADEMARK",
		1 => "COLLECTION",
		2 => "MATREBASE",
		3 => "POPULAR",
		4 => "",
	),
	"COMPARE_OFFERS_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"COMPARE_OFFERS_PROPERTY_CODE" => array(
		0 => "HEIGHT",
		1 => "LENGTH",
		2 => "WIDTH",
		3 => "",
	),
	"COMPARE_ELEMENT_SORT_FIELD" => "sort",
	"COMPARE_ELEMENT_SORT_ORDER" => "asc",
	"DISPLAY_ELEMENT_SELECT_BOX" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"PRODUCT_PROPERTIES" => array(
		0 => "MATREBASE",
	),
	"USE_PRODUCT_QUANTITY" => "Y",
	"CONVERT_CURRENCY" => "N",
	"OFFERS_CART_PROPERTIES" => array(
		0 => "HEIGHT",
		1 => "LENGTH",
		2 => "WIDTH",
	),
	"SHOW_TOP_ELEMENTS" => "Y",
	"TOP_ELEMENT_COUNT" => $count_elements,
	"TOP_LINE_ELEMENT_COUNT" => "3",
	"TOP_ELEMENT_SORT_FIELD" => "sort",
	"TOP_ELEMENT_SORT_ORDER" => "asc",
	"TOP_PROPERTY_CODE" => array(
		0 => "MATREBASE",
		1 => "",
	),
	"TOP_OFFERS_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"TOP_OFFERS_PROPERTY_CODE" => array(
		0 => "CML2_LINK",
		1 => "HEIGHT",
		2 => "LENGTH",
		3 => "WIDTH",
		4 => "",
	),
	"TOP_OFFERS_LIMIT" => "5",
	"SECTION_COUNT_ELEMENTS" => "Y",
	"SECTION_TOP_DEPTH" => "2",
	"PAGE_ELEMENT_COUNT" => "0",
	"LINE_ELEMENT_COUNT" => "3",
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"LIST_PROPERTY_CODE" => array(
		0 => "TRADEMARK",
		1 => "",
	),
	"INCLUDE_SUBSECTIONS" => "Y",
	"LIST_META_KEYWORDS" => "-",
	"LIST_META_DESCRIPTION" => "-",
	"LIST_BROWSER_TITLE" => "NAME",
	"LIST_OFFERS_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"LIST_OFFERS_PROPERTY_CODE" => array(
		0 => "CML2_LINK",
		1 => "HEIGHT",
		2 => "LENGTH",
		3 => "WIDTH",
		4 => "",
	),
	"LIST_OFFERS_LIMIT" => "5",
	"DETAIL_PROPERTY_CODE" => array(
		0 => "RELATED_PRODUCTS",
		1 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",
	"DETAIL_META_DESCRIPTION" => "-",
	"DETAIL_BROWSER_TITLE" => "-",
	"DETAIL_OFFERS_FIELD_CODE" => array(
		0 => "",
		1 => "",
	),
	"DETAIL_OFFERS_PROPERTY_CODE" => array(
		0 => "HEIGHT",
		1 => "LENGTH",
		2 => "WIDTH",
		3 => "",
	),
	"LINK_IBLOCK_TYPE" => "",
	"LINK_IBLOCK_ID" => "",
	"LINK_PROPERTY_SID" => "",
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
	"USE_ALSO_BUY" => "N",
	"USE_STORE" => "N",
	"OFFERS_SORT_FIELD" => "sort",
	"OFFERS_SORT_ORDER" => "asc",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "N",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"sections" => "",
		"section" => "#SECTION_CODE#/",
		"element" => "#SECTION_CODE#/#ELEMENT_CODE#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);?>
    
    <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>