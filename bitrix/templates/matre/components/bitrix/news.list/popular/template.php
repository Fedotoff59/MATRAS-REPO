<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult["ITEMS"])):?>
<div class="bg"></div>	
<h3>попул€рные товары</h3>	
<div class="inner">
    <ul>			
    <?foreach($arResult["ITEMS"] as $cell => $arItem):?>
        <li>
            <div class="img">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt=""/>
            </div>
            <a href="<?=$arItem["DETAIL_PAGE_URL"]?>"><?=$arItem["NAME"]?></a>
            <div class="text">
                <?=$arItem["PREVIEW_TEXT"]?>
            </div>
            <div class="price">
                <?=$arItem["PRICE"]?> руб.
            </div>
        </li>
    <?endforeach?>                            
    </ul>
    <div class="clear_fix"></div>
</div><!-- .inner -->	
<div class="arrow">
    <a href="" class="l"></a>
    <a href="" class="r"></a>
</div>
<?endif;?>