<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог");
?>
<div id="sidebar">
	
	<div class="widget filter">
		
		<div class="sub">
			<h3>Подбор по параметрам</h3>
		</div>
		
		<div class="item">
			<div class="level">Размер матраса</div>
			<select name="">
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
				<option>80 x 200 мм</option>
			</select>
		</div>
		
		<div class="item" id="price">
			<div class="level">Цена</div>
			от:&nbsp;<input type="text" name="" id="start" value="200000"/>&nbsp;до:&nbsp;<input type="text" name="" id="end" value="2000000"/>
			<div class="box"></div>
		</div>
		
		<div class="item">
			<div class="level">Бренд</div>
			<div class="li">
				<label><input type="checkbox" name="" checked="checked"/> Lonax Premium</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> ASKONA</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> Орматек</label>
			</div>
			<div class="li">
				<label><input type="checkbox" name=""/> Промтекс-ориент</label>
			</div>
			<div class="">
				<label><input type="checkbox" name=""/> Все</label>
			</div>
		</div>
		
		<div class="item">
			<div class="level">Основа матраса</div>
			<select name="">
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
				<option>Пружинная</option>
			</select>
		</div>
		
		<div class="bt">
			<button type="submit">Показать 25 товаров</button>
		</div>
		
	</div><!-- .filter -->
	
	<div class="widget cat_list">
		
<?$APPLICATION->IncludeComponent("bitrix:catalog.section.list","tree",
Array(
		"IBLOCK_TYPE" => "catalog",
		"IBLOCK_ID" => "6",
		"SECTION_ID" => $_REQUEST["SECTION_ID"],
		"SECTION_CODE" => "",
		"SECTION_URL" => "",
		"COUNT_ELEMENTS" => "N",
		"TOP_DEPTH" => "2",
		"SECTION_FIELDS" => "",
		"SECTION_USER_FIELDS" => "",
		"ADD_SECTIONS_CHAIN" => "N",
		"CACHE_TYPE" => "N",
		"CACHE_TIME" => "36000000",
		"CACHE_NOTES" => "",
		"CACHE_GROUPS" => "Y"
	)		
);?>
		
	</div><!-- .cat_list -->
</div><!-- #sidebar -->
<?
                    global $arrTradenarkFilter;
                    $arrTradenarkFilter = Array(
                        "PROPERTY_TRADEMARK" => "6592"
                    );
                ?>
<?
$APPLICATION->IncludeComponent("bitrix:catalog.sections.top", "trademarks", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "6",
	"SECTION_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_SORT_FIELD" => "sort",
	"SECTION_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD" => "id",
	"ELEMENT_SORT_ORDER" => "asc",
	"FILTER_NAME" => "arrTradenarkFilter",
	"SECTION_COUNT" => "20",
	"ELEMENT_COUNT" => "20",
	"LINE_ELEMENT_COUNT" => "3",
	"PROPERTY_CODE" => array(
		0 => "",
		1 => "CML2_ARTICLE",
		2 => "",
	),
	"SECTION_URL" => "",
	"DETAIL_URL" => "",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"CACHE_TYPE" => "N",
	"CACHE_TIME" => "3600",
	"CACHE_FILTER" => "Y",
	"CACHE_GROUPS" => "Y",
	"DISPLAY_COMPARE" => "Y",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "Y",
	"CURRENCY_ID" => "RUB"
	),
	false
);?>

<?/*$APPLICATION->IncludeComponent("melcosoft:splitcatalog", ".default", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "7",
	"BASKET_URL" => "/personal/basket.php",
	"ACTION_VARIABLE" => "action",
	"PRODUCT_ID_VARIABLE" => "id",
	"SECTION_ID_VARIABLE" => "SECTION_ID",
	"PRODUCT_QUANTITY_VARIABLE" => "quantity",
	"PRODUCT_PROPS_VARIABLE" => "prop",
	"SEF_MODE" => "Y",
	"SEF_FOLDER" => "/manufacturers/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"CACHE_TYPE" => "A",
	"CACHE_TIME" => "36000000",
	"CACHE_FILTER" => "N",
	"CACHE_GROUPS" => "Y",
	"SET_TITLE" => "Y",
	"SET_STATUS_404" => "N",
	"USE_ELEMENT_COUNTER" => "Y",
	"USE_FILTER" => "N",
	"USE_REVIEW" => "N",
	"USE_COMPARE" => "N",
	"PRICE_CODE" => array(
		0 => "BASE",
	),
	"USE_PRICE_COUNT" => "N",
	"SHOW_PRICE_COUNT" => "1",
	"PRICE_VAT_INCLUDE" => "Y",
	"PRICE_VAT_SHOW_VALUE" => "N",
	"PRODUCT_PROPERTIES" => array(
	),
	"USE_PRODUCT_QUANTITY" => "N",
	"CONVERT_CURRENCY" => "N",
	"SHOW_TOP_ELEMENTS" => "Y",
	"TOP_ELEMENT_COUNT" => "9",
	"TOP_LINE_ELEMENT_COUNT" => "3",
	"TOP_ELEMENT_SORT_FIELD" => "sort",
	"TOP_ELEMENT_SORT_ORDER" => "asc",
	"TOP_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"SECTION_COUNT_ELEMENTS" => "Y",
	"SECTION_TOP_DEPTH" => "2",
	"PAGE_ELEMENT_COUNT" => "30",
	"LINE_ELEMENT_COUNT" => "3",
	"ELEMENT_SORT_FIELD" => "sort",
	"ELEMENT_SORT_ORDER" => "asc",
	"LIST_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"INCLUDE_SUBSECTIONS" => "Y",
	"LIST_META_KEYWORDS" => "-",
	"LIST_META_DESCRIPTION" => "-",
	"LIST_BROWSER_TITLE" => "-",
	"DETAIL_PROPERTY_CODE" => array(
		0 => "",
		1 => "",
	),
	"DETAIL_META_KEYWORDS" => "-",
	"DETAIL_META_DESCRIPTION" => "-",
	"DETAIL_BROWSER_TITLE" => "-",
	"LINK_IBLOCK_TYPE" => "catalog",
	"LINK_IBLOCK_ID" => "6",
	"LINK_PROPERTY_SID" => "TRADEMARK",
	"LINK_ELEMENTS_URL" => "link.php?PARENT_ELEMENT_ID=#ELEMENT_ID#",
	"USE_ALSO_BUY" => "N",
	"USE_STORE" => "N",
	"DISPLAY_TOP_PAGER" => "N",
	"DISPLAY_BOTTOM_PAGER" => "Y",
	"PAGER_TITLE" => "Товары",
	"PAGER_SHOW_ALWAYS" => "Y",
	"PAGER_TEMPLATE" => "",
	"PAGER_DESC_NUMBERING" => "N",
	"PAGER_DESC_NUMBERING_CACHE_TIME" => "36000",
	"PAGER_SHOW_ALL" => "N",
	"RESIZE_PREVIEW" => "Y",
	"RESIZE_PREVIEW_WIDTH" => "198",
	"RESIZE_PREVIEW_HEIGHT" => "220",
	"GET_DETAIL_PICTURE" => "Y",
	"AJAX_OPTION_ADDITIONAL" => "",
	"SEF_URL_TEMPLATES" => array(
		"sections" => "",
		"section" => "#ELEMENT_CODE#/",
		"element" => "/catalog/#SECTION_CODE#/#ELEMENT_CODE#/",
		"compare" => "compare.php?action=#ACTION_CODE#",
	),
	"VARIABLE_ALIASES" => array(
		"compare" => array(
			"ACTION_CODE" => "action",
		),
	)
	),
	false
);*/?>  
<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
