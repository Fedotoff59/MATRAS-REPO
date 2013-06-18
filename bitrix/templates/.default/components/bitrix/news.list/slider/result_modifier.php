<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
foreach ($arResult["ITEMS"] as &$arItem) {
    
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
}
unset($arItem);
?>