<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

if (!CModule::IncludeModule("iblock"))
    return;

foreach ($arResult["ITEMS"] as &$arItem) {

    $dbSection = CIBlockSection::GetByID($arItem["~IBLOCK_SECTION_ID"]);
    if ($arSection = $dbSection->GetNext()) {
        $arItem["DETAIL_PAGE_URL"] = str_replace(
                array("#SECTION_CODE#", "#ELEMENT_CODE#"), array($arSection["CODE"], $arItem["CODE"]), $arParams["DETAIL_URL"]);
    }
    //$arItem["CODE"]        

    $preview = false;
    if (is_array($arItem["PREVIEW_PICTURE"])) {
        $preview = $arItem["PREVIEW_PICTURE"];
    } else {
        if ($arParams["GET_DETAIL_PICTURE"] == "Y" && is_array($arItem["DETAIL_PICTURE"]))
            $preview = $arItem["DETAIL_PICTURE"];
    }

    if (!$preview) {
        $preview = array(
            "FILE_NAME" => "noimage.jpg",
            "SUBDIR" => "",
            "SRC" => "/upload/noimage.jpg"
        );

        $isize = getimagesize($_SERVER["DOCUMENT_ROOT"] . $preview["SRC"]);

        $preview["CONTENT_TYPE"] = $isize["mime"];
        $preview["WIDTH"] = $isize[0];
        $preview["HEIGHT"] = $isize[1];
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

    if (is_array($preview)) {
        $arItem["PREVIEW_PICTURE"] = $preview;
    }
}
unset($arItem);
?>