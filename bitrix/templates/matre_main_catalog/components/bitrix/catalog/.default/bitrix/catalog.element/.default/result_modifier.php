<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
    if(isset($_GET['OFFER']) && $_GET['OFFER'] > 0) {
        $curOffer = htmlspecialcharsbx($_GET['OFFER']);
        if(is_array($arResult["OFFERS"]) && !empty($arResult["OFFERS"])) {
            foreach($arResult["OFFERS"] as $arOffer)
                $arOfferIDs[] = $arOffer['ID'];
            if(is_array($arOfferIDs) && in_array($curOffer, $arOfferIDs))
                $arResult['CUR_OFFER'] = $curOffer;
        }    
    }
?>
