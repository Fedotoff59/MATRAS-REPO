<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
foreach ($arResult["SECTIONS"] as &$arItem) {
    if (is_array($arItem["PICTURE"])) {
        $arFileTmp = CFile::ResizeImageGet(
                        $arItem["PICTURE"], array("width" => $arParams["PREVIEW_WIDTH"], "height" => $arParams["PREVIEW_HEIGHT"]), BX_RESIZE_IMAGE_PROPORTIONAL, true
        );
        $arItem["PICTURE"] = array(
            "SRC" => $arFileTmp["src"],
            "WIDTH" => $arFileTmp["width"],
            "HEIGHT" => $arFileTmp["height"],
        );
    }
}
unset($arItem);
?>