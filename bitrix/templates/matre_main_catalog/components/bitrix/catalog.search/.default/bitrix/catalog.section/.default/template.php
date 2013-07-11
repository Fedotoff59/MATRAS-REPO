<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<ul>
<?foreach($arResult["ITEMS"] as $cell=>$arElement):?>
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
        <div class="price" id="price_<?=$arElement["ID"]?>"><?=$arPrice["PRINT_VALUE"]?></div>
    </div>
    <button type="submit" class="cart"><?echo GetMessage("CATALOG_BUY")?></button>
    <div class="hd">
        <div class="in">                
            <form action="<?=$arElement['ADD_URL']?>" id="buyform_<?=$arElement['ID']?>" method="POST">
                <?if(is_array($arElement["OFFERS"]) && !empty($arElement["OFFERS"])):?>
                <select class="default" id="select_<?=$arElement["ID"]?>">
                    <?foreach($arElement["OFFERS"] as $arOffer): $i = 1;?>
                        <?foreach($arOffer["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
                            if($i % 5 == 0 || $i == 1) 
                                echo '<option id ="size_'.$arOffer['ID'].'">'; 
                                else {
                                    echo $arProperty["VALUE"];
                                    if($i % 4 != 0) echo ' x';
                                }?>
                            
                            <?if($i % 4 == 0) echo ' ÒÏ</option>'; $i++?>
                        <?endforeach?>
                    <?endforeach?>
		</select>
                <?foreach($arElement["OFFERS"] as $arOffer):?>
                    <input type="hidden" id="buyurl_<?=$arOffer['ID']?>" value="<?=$arOffer["BUY_URL"]?>">
                    <input type="hidden" id="addurl_<?=$arOffer['ID']?>" value="<?=$arOffer["ADD_URL"]?>">
                    <input type="hidden" id="compareurl_<?=$arOffer['ID']?>" value="/catalog/?action=ADD_TO_COMPARE_LIST&id=<?=$arOffer['ID']?>">
                    <?foreach($arOffer["PRICES"] as $code=>$arPrice):?>
                        <?if($arPrice["CAN_ACCESS"]):?>
                                <input type="hidden" id="price_<?=$arOffer['ID']?>" value="<?=$arPrice["PRINT_VALUE"]?>">
                        <?endif;?>
                    <?endforeach;?>
                <?endforeach;?>
                <?endif?>
                <button type="submit" class="cart"><?echo GetMessage("CATALOG_BUY")?></button>
            </form>
            <div class="link">
                <a href="<?=$arElement['BUY_URL']?>" class="click" id="buyoneclick_<?=$arElement['ID']?>" rel="nofollow"><i></i> ”œ»“‹ ¬ 1  À» </a><br/>
                <?if($arParams["DISPLAY_COMPARE"]):?>
                    <a href="/catalog/?action=ADD_TO_COMPARE_LIST&id=<?=$arElement['ID']?>" rel="nofollow" class="compare" id="compare_<?=$arElement['ID']?>"><i></i><?echo GetMessage("CATALOG_COMPARE")?></a><br/>
                <?endif;?>
                <a href="/articles/credit.php" class="credit"><i></i> ÛÔËÚ¸ ‚ ÍÂ‰ËÚ</a>
            </div>
            
        </div>
    </div>       
<?endif;?>
<?endforeach?>

</ul>
