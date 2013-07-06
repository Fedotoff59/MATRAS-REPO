<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
$arResult["TD_WIDTH"] = round(100/$arParams["LINE_ELEMENT_COUNT"])."%";
$arResult["nRowsPerItem"] = 1; //Image, Name and Properties
$arResult["bDisplayPrices"] = false;
foreach($arResult["ITEMS"] as $arItem)
{
    if(count($arItem["PRICES"])>0 || is_array($arItem["PRICE_MATRIX"]))
		$arResult["bDisplayPrices"] = true;
	if($arResult["bDisplayPrices"])
		break;
}
if($arResult["bDisplayPrices"])
	$arResult["nRowsPerItem"]++; // Plus one row for prices
$arResult["bDisplayButtons"] = $arParams["DISPLAY_COMPARE"] || count($arResult["PRICES"])>0;
foreach($arResult["ITEMS"] as $arItem)
{
	if($arItem["CAN_BUY"])
		$arResult["bDisplayButtons"] = true;
	if($arResult["bDisplayButtons"])
		break;
}
if($arResult["bDisplayButtons"])
	$arResult["nRowsPerItem"]++; // Plus one row for buttons

//array_chunk
$arResult["ROWS"] = array();
while(count($arResult["ITEMS"])>0)
{
	$arRow = array_splice($arResult["ITEMS"], 0, $arParams["LINE_ELEMENT_COUNT"]);
	while(count($arRow) < $arParams["LINE_ELEMENT_COUNT"])
		$arRow[]=false;
	$arResult["ROWS"][]=$arRow;
}
/***    START FILTER    ***/
//echo '<pre>'; print_r($_POST); echo '</pre>';
if(isset($_GET['CATALOGFILTER']) && $_GET['CATALOGFILTER'] == 'Y'):
// START TRADEMARK FILTER
$bCheckedBrands = false;
if(isset($_POST)){
    $arPOSTParams = $_POST;
    foreach ($arPOSTParams as $key => $val) {
        $isBrand = strpos($key, 'brand_');
        if ($isBrand !== false)
            $bCheckedBrands = true;
    }
}
$arBFilter = Array('IBLOCK_ID' => 7, 'ACTIVE'=>'Y');
$db_list = CIBlockSection::GetList(false, $arBFilter, true);
while($ar_trademarks = $db_list->GetNext())
    {
        $TID = $ar_trademarks["ID"];
        if(isset($_POST['brand_'.$TID]) && $_POST['brand_'.$TID] == 'on')
            $arBrandFilter[] = $TID;
    }
foreach($arResult["ROWS"] as $row => $arItems)
    foreach($arItems as $el => $arElement):
        if($bCheckedBrands && !in_array($arElement['PROPERTIES']['TRADEMARK']['VALUE'], $arBrandFilter))
            unset($arResult["ROWS"][$row][$el]);
    endforeach;
endif;
//END TRADEMARK FILTER

/***    END FILTER    ***/
?>
