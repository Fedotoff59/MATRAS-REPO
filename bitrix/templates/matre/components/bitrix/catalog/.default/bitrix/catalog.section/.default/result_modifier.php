<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<?
foreach($arResult["ITEMS"] as $cell => $arElement):
    foreach($arElement["OFFERS"] as $elID => $arOffer): 
        foreach($arOffer["PRICES"] as $pID => $arPrice):
            $arPrices[] = $arPrice['VALUE'];
        endforeach;
    endforeach;
    
endforeach;
?>