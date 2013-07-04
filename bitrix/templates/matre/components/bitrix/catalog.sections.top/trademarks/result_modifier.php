<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
global $arrTrademarkFilter;
if (is_array($arrTrademarkFilter) && $arrTrademarkFilter['PROPERTY_TRADEMARK'] != '')    {
    $sec_trademark_id = $arrTrademarkFilter['PROPERTY_TRADEMARK'];
    $res_trademark = CIBlockSection::GetByID($sec_trademark_id);
    $ar_trademark = $res_trademark->GetNext();
    $arResult['TRADEMARK']['NAME'] = $ar_trademark['NAME'];
    $trademark_link = $APPLICATION->GetCurPageParam('TRADEMARK='.$sec_trademark_id, Array('TRADEMARK', 'COLLECTION'));
    $APPLICATION->AddChainItem('Продукция '.$ar_trademark['NAME'], $trademark_link);
    $arResult['TRADEMARK']['DESCRIPTION'] = $ar_trademark['DESCRIPTION'];
    $arResult['TRADEMARK']['ITEMS'] = Array();
    $arSelect = Array("ID", "NAME", "PREVIEW_TEXT", "PREVIEW_PICTURE");
    $collection_id = ($arrTrademarkFilter['PROPERTY_COLLECTION'] != '') ? $arrTrademarkFilter['PROPERTY_COLLECTION'] : '';    
    $arFilter = Array("IBLOCK_ID" => 7, "ACTIVE"=>"Y", "ID" => $collection_id, "SECTION_ID" => $sec_trademark_id);
    $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
    while($ob = $res->GetNextElement())
    {
        $arFields = $ob->GetFields();
        $arElement['ID'] = $arFields['ID'];
        $arElement['LINK'] = $APPLICATION->GetCurPageParam('COLLECTION='.$arFields['ID'], Array('COLLECTION'));
        if ($collection_id != '')
            $APPLICATION->AddChainItem('Коллекция '.$arFields['NAME'], $arElement['LINK']);
        $arElement['PREVIEW_TEXT'] = $arFields['PREVIEW_TEXT'];
        if ($arFields["PREVIEW_PICTURE"] != '') {
            $path = CFile::GetPath($arFields["PREVIEW_PICTURE"]);
            $arElement['PREVIEW_PICTURE_SRC'] = $path;
        }
        $arResult['TRADEMARK']['ITEMS'][] = $arElement;
    }
}
foreach($arResult["SECTIONS"] as &$arSection):
    if(is_array($arSection['ITEMS']) && !empty($arSection['ITEMS'])):
        $res = CIBlockSection::GetByID($arSection['ID']);
        $ar_section = $res->GetNext();
        if ($ar_section['DEPTH_LEVEL'] == 2) {
            $res_parent = CIBlockSection::GetByID($ar_section['IBLOCK_SECTION_ID']);
            $ar_section_parent = $res_parent->GetNext();
            $arSection['PARENT'] = $ar_section_parent['NAME'];
        }
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