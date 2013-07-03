<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
foreach($arResult["SECTIONS"] as &$arSection):
    if(is_array($arSection['ITEMS']) && !empty($arSection['ITEMS'])):
        foreach($arSection['ITEMS'] as &$arElement):
            $arOffers = CIBlockPriceTools::GetOffersArray(
					6
					,array($arElement['ID'])
					,array("sort" => "asc",
					)
					,array(0 => "", 1 => "")
					,array(
                                            0 => "CML2_LINK",
                                            1 => "HEIGHT",
                                            2 => "LENGTH",
                                            3 => "WIDTH",
                                            4 => "",
                                            )
					,10
					,$arResult['PRICES']
					,"N"
					,"RUB"
				);
				/*foreach($arOffers as $arOffer)
				{
					$arOffer["BUY_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=BUY&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
					$arOffer["ADD_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=ADD2BASKET&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
					$arOffer["COMPARE_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam("action=ADD_TO_COMPARE_LIST&id=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));
					$arOffer["SUBSCRIBE_URL"] = htmlspecialcharsbx($APPLICATION->GetCurPageParam($arParams["ACTION_VARIABLE"]."=SUBSCRIBE_PRODUCT&".$arParams["PRODUCT_ID_VARIABLE"]."=".$arOffer["ID"], array($arParams["PRODUCT_ID_VARIABLE"], $arParams["ACTION_VARIABLE"])));

					//$arResult["OFFERS"][] = $arOffer;
				}*/
			
            $arElement["OFFERS"] = $arOffers;
        endforeach;
    endif;
endforeach;
?>      