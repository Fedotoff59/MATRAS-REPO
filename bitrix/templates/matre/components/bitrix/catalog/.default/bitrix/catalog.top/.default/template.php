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
                        <div class="price" id="price_<?=$arElement["ID"]?>"><?=$arPrice["PRINT_VALUE"]?></div>
                    <?endif?>
                <?endif;?>
            <?endforeach;?>
        <?endif;?>
    </div>
    <button type="submit" class="cart"><?echo GetMessage("CATALOG_BUY")?></button>
    <div class="hd">
        <div class="in">                
            <form action="index.php?action=ADD2BASKET&" method="POST">
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
                            
                            <?if($i % 4 == 0) echo ' ��</option>'; $i++?>
                        <?endforeach?>
                    <?endforeach?>
		</select>
                <?foreach($arElement["OFFERS"] as $arOffer):?>                    
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
                <a href="<?echo $arElement["BUY_URL"]?>" class="click" rel="nofollow"><i></i>������ � 1 ����</a><br/>
                <?if($arParams["DISPLAY_COMPARE"]):?>
                    <a href="<?echo $arElement["COMPARE_URL"]?>" rel="nofollow" class="compare"><i></i><?echo GetMessage("CATALOG_COMPARE")?></a><br/>
                <?endif;?>
                <a href="#" class="credit"><i></i>������ � ������</a>
            </div>
            
        </div>
    </div>       
<?endif;?>
<?endforeach?>
<?endforeach?>

</ul>
</div>
