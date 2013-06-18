<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) die(); ?>
<?

if (!CModule::IncludeModule("iblock"))
    return;

if (is_array($arResult["DISPLAY_PROPERTIES"]["RELATED_PRODUCTS"]["~VALUE"]))
{
    $arProducts = array();
    foreach ($arResult["DISPLAY_PROPERTIES"]["RELATED_PRODUCTS"]["~VALUE"] as $PRODUCT_ID)
    {
        $dbProduct = CIBlockElement::GetByID($PRODUCT_ID);
        if ($arProduct = $dbProduct->GetNext())
        {
            
            if (intval($arProduct["PREVIEW_PICTURE"])>0)
                $arProduct["PREVIEW_PICTURE"] = CFile::GetFileArray($arProduct["PREVIEW_PICTURE"]);
            
            if (intval($arProduct["DETAIL_PICTURE"])>0)
                $arProduct["DETAIL_PICTURE"] = CFile::GetFileArray($arProduct["DETAIL_PICTURE"]);
            
            $arPriceList = GetCatalogProductPriceList($PRODUCT_ID, "SORT", "ASC");
            $BASE = false;
            foreach ($arPriceList as $arPrice)
            {
                if ($arPrice["BASE"] == "Y")
                {
                    $BASE = $arPrice;
                    break;
                }
            }
            
            if ($BASE)
            {
                $arProducts[] = array("ELEMENT"=>$arProduct,"PRICE"=>$BASE);
            }
        }
    }
    
    $arResult["RELATED_PRODUCTS"] = $arProducts;
}


$preview = false;
if (is_array($arResult["PREVIEW_PICTURE"])) {
    $preview = $arResult["PREVIEW_PICTURE"];
} else {
    if ($arParams["GET_DETAIL_PICTURE"] == "Y" && is_array($arResult["DETAIL_PICTURE"]))
        $preview = $arResult["DETAIL_PICTURE"];
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
    $arResult["PREVIEW_PICTURE"] = $preview;
}
?>