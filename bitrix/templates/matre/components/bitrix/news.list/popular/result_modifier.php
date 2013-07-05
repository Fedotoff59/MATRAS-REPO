<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
/*
foreach ($arResult["ITEMS"] as $id => $arItem):
    if ($arItem['PROPERTIES']['POPULAR']['VALUE'] == '')
        unset($arResult["ITEMS"][$id]);
endforeach;
 */
foreach ($arResult["ITEMS"] as &$arItem):
    if (CModule::IncludeModule("catalog")) {
        $arSelect = Array("ID", "CML2_LINK");
        $arFilter = Array("IBLOCK_ID" => 13, "ACTIVE"=>"Y", "PROPERTY_CML2_LINK" => $arItem['ID']);
        $res = CIBlockElement::GetList(Array(), $arFilter, false, false, $arSelect);
        $arPrices = Array();
        while ($ob = $res->GetNextElement()) {
            $arElFields = $ob->GetFields();
            $ar_res = CPrice::GetBasePrice($arElFields['ID']);
            $arPrices[] = floatval($ar_res['PRICE']);
        }
        //$arPrices = GetCatalogProductPrice($arItem['ID'], 1);
        $stPrice = min($arPrices);
        $arItem['PRICE'] = number_format($stPrice, 0, '.', ' ');
        //echo '<script>alert("'.print_r($prise).'");</script>';
        //AddMessage2Log('$arPrices = '.print_r($arPrices, true),'');
    }
    if (!is_array($arItem["PREVIEW_PICTURE"]))
    {
        $arItem["PREVIEW_PICTURE"] = $arItem["DETAIL_PICTURE"];
    }
    
    if (is_array($arItem["PREVIEW_PICTURE"])) {
        $arFileTmp = CFile::ResizeImageGet(
                        $arItem["PREVIEW_PICTURE"], array("width" => $arParams["PREVIEW_WIDTH"], "height" => $arParams["PREVIEW_HEIGHT"]), BX_RESIZE_IMAGE_PROPORTIONAL, true
        );
        $arItem["PREVIEW_PICTURE"] = array(
            "SRC" => $arFileTmp["src"],
            "WIDTH" => $arFileTmp["width"],
            "HEIGHT" => $arFileTmp["height"],
        );
    }
endforeach;
?>