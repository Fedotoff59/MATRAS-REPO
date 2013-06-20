<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
foreach ($arResult["ITEMS"] as $id => $arItem):
    if ($arItem['PROPERTIES']['POPULAR']['VALUE'] == '')
        unset($arResult["ITEMS"][$id]);
endforeach;
foreach ($arResult["ITEMS"] as &$arItem):
    if (CModule::IncludeModule("catalog")) {   
        $arPrices = GetCatalogProductPrice($arItem['ID'], 1);
        $stPrice = $arPrices['PRICE'];
        $arItem['PRICE'] = number_format($stPrice, 0, '.', ' ');
        //echo '<script>alert("'.print_r($prise).'");</script>';
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