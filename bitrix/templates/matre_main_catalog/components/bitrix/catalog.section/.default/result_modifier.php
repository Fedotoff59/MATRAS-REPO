<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?

function PriceFilter($arItems) {
    if (isset($_POST['max_price']) && isset($_POST['min_price']) && $_POST['max_price'] != '' && $_POST['min_price'] !=''):
    $intMaxPrice = IntVal($_POST['max_price']);
    $intMinPrice = IntVAl($_POST['min_price']);
    foreach($arItems as $cell => $arElement):
        foreach($arElement["OFFERS"] as $elID => $arOffer):
            foreach($arOffer["PRICES"] as $pID => $arPrice):
                $arPrices[] = $arPrice['VALUE'];
            endforeach;
        endforeach;
        $unsetflag = true;
        foreach ($arPrices as $curPrice)
            if ($curPrice >= $intMinPrice && $curPrice <= $intMaxPrice)
                $unsetflag = false;
        if ($unsetflag)
            unset($arItems[$cell]);
        unset($arPrices);
    endforeach;
    endif;    
}

function SizeFilter($arItems) {
    if (isset($_POST['size']) && ($_POST['size'] != 'Не важно')):
    $reqSize = $_POST['size'];
    foreach($arItems as $cell => $arElement):
        foreach($arElement["OFFERS"] as $elID => $arOffer):
            $arSizes[$elID] = $arOffer['PROPERTIES']['HEIGHT']['VALUE'].' x ';
            $arSizes[$elID] .= $arOffer['PROPERTIES']['LENGTH']['VALUE'].' x ';
            $arSizes[$elID] .= $arOffer['PROPERTIES']['WIDTH']['VALUE'].' см';
        endforeach;
        $unsetflag = true;
        foreach ($arSizes as $curSize)
            if ($curSize == $reqSize)
                $unsetflag = false;
        if ($unsetflag)
            unset($arItems[$cell]); 
        unset($arSizes);
    endforeach;
    endif;
}

function FilterLimit($arItems, $Limit = 1) {
    $i = 0;
    foreach($arItems as $cell => $arElement){
        $i++;
        if ($i > $Limit)
            unset($arItems[$cell]);
    }
}

if (isset($_GET['CATALOGFILTER']) && $_GET['CATALOGFILTER'] == 'Y'):
/* START 2 PART OF SMART FILTER */
// START PRICES FILTER
PriceFilter(&$arResult["ITEMS"]);
// START SIZES FILTER
SizeFilter(&$arResult["ITEMS"]);
// FILTER LIMITATION
$FilterLimit = 25;
FilterLimit(&$arResult["ITEMS"], $FilterLimit);
// CHECK RESULT    
if(empty($arResult["ITEMS"]))
   echo "К сожалению, по вашему запросу ничего не найдено.";
endif;

?>