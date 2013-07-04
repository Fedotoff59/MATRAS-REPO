<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Каталог товаров");
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
if (isset($_GET['TRADEMARK']) && $_GET['TRADEMARK'] != '') {   
    global $arrTrademarkFilter;
    $arrTrademarkFilter = Array(
        "PROPERTY_TRADEMARK" => htmlspecialcharsbx($_GET['TRADEMARK'])
        );
    if (isset($_GET['COLLECTION']) && $_GET['COLLECTION'] != '')
        $arrTrademarkFilter['PROPERTY_COLLECTION'] = htmlspecialcharsbx($_GET['COLLECTION']);
}
?>
<?
$APPLICATION->IncludeComponent("bitrix:catalog.sections.top", "trademarks", array(
	"IBLOCK_TYPE" => "catalog",
	"IBLOCK_ID" => "6",
	"SECTION_FIELDS" => array(
		0 => "ID",
		1 => "CODE",
		2 => "NAME",
		3 => "SORT",
		4 => "DESCRIPTION",
		5 => "PICTURE",
		6 => "",
	),
	"SECTION_USER_FIELDS" => array(
		0 => "",
		1 => "",
	),
	"SECTION_SORT_FIELD" => "sort",
	"SECTION_SORT_ORDER" => "asc",
	"ELEMENT_SORT_FIELD" => "id",
	"ELEMENT_SORT_ORDER" => "asc",
	"FILTER_NAME" => "arrTrademarkFilter",
	"SECTION_COUNT" => "0",
	"ELEMENT_COUNT" => "0",
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

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>
