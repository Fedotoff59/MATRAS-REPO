<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?
if (!CModule::IncludeModule("iblock"))
    return;

foreach ($arResult["ITEMS"]["AnDelCanBuy"] as &$arResult) {
    $preview = false;
    if (is_array($arResult["ELEMENT"]["PREVIEW_PICTURE"])) {
        $preview = $arResult["ELEMENT"]["PREVIEW_PICTURE"];
    } else {
        if ($arParams["GET_DETAIL_PICTURE"] == "Y" && is_array($arResult["ELEMENT"]["DETAIL_PICTURE"]))
            $preview = $arResult["ELEMENT"]["DETAIL_PICTURE"];
    }

    if (is_array($preview) && $arParams["RESIZE_PREVIEW"] == "Y") {
        $arFileTmp = CFile::ResizeImageGet(
                        $preview, array("width" => $arParams["RESIZE_PREVIEW_WIDTH"], "height" => $arParams["RESIZE_PREVIEW_HEIGHT"]), BX_RESIZE_IMAGE_PROPORTIONAL, true
        );

        $preview = array(
            "SRC" => $arFileTmp["src"],
            "WIDTH" => $arFileTmp["width"],
            "HEIGHT" => $arFileTmp["height"],
        );
    }
    
    if (is_array($preview))
    {
        $arResult["ELEMENT"]["PREVIEW_PICTURE"] = $preview;
    }
}
unset($arResult);
?>