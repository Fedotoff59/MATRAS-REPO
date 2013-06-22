<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<div class="listing">
<ul>
<?foreach($arResult["ROWS"] as $arItems):?>
<?foreach($arItems as $arElement):?>
<?if(is_array($arElement)):?>
<?
$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_EDIT"));
$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arElement["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCT_ELEMENT_DELETE_CONFIRM')));
?>
<li>
    <div class="info">
        <?if(is_array($arElement["PREVIEW_PICTURE"])):?>
        <div class="img">
            <a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><img border="0" src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /></a>
        </div>
        <?endif?>
        <a href="<?=$arElement["DETAIL_PAGE_URL"]?>"><?=$arElement["NAME"]?></a>
        <div class="text">
            <?=$arElement["PREVIEW_TEXT"]?>
        </div>
        <?if($arResult["bDisplayPrices"]):?>
            <?foreach($arElement["PRICES"] as $code=>$arPrice):?>
                <?if($arPrice["CAN_ACCESS"]):?>			
                    <?if($arPrice["DISCOUNT_VALUE"] < $arPrice["VALUE"]):?>
                        <s><?=$arPrice["PRINT_VALUE"]?></s> <div class="price"><?=$arPrice["PRINT_DISCOUNT_VALUE"]?></div>
                    <?else:?>
                        <div class="price"><?=$arPrice["PRINT_VALUE"]?></div>
                    <?endif?>
                <?endif;?>
            <?endforeach;?>
        <?endif;?>
    </div>
    <button type="submit" class="cart"><?echo GetMessage("CATALOG_BUY")?></button>
    <div class="hd">
        <div class="in">
            <form action="<?=$arElement["ADD_URL"]?>" method="GET">
                <select class="default">
                    <option>80 x 200 לל</option>
                    <option>80 x 200 לל</option>
                    <option>80 x 200 לל</option>
                    <option>80 x 200 לל</option>
                    <option>80 x 200 לל</option>
                    <option>80 x 200 לל</option>
		</select>
                <button type="submit" class="cart"><?echo GetMessage("CATALOG_BUY")?></button>
            </form>
            <div class="link">
                <a href="<?echo $arElement["BUY_URL"]?>" class="click" rel="nofollow"><i></i>ÊÓÏÈÒÜ Â 1 ÊËÈÊ</a><br/>
                <?if($arParams["DISPLAY_COMPARE"]):?>
                    <a href="<?echo $arElement["COMPARE_URL"]?>" rel="nofollow" class="compare"><i></i><?echo GetMessage("CATALOG_COMPARE")?></a><br/>
                <?endif;?>
                <a href="#" class="credit"><i></i>Êףןטעü ג ךנוהטע</a>
            </div>
        </div>
    </div>       
<?endif;?>
<?endforeach?>
<?endforeach?>
</ul>
</div>
