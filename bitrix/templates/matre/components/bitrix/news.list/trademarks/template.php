<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if (!empty($arResult["ITEMS"])):?>
    <ul>			
    <?foreach($arResult["ITEMS"] as $cell => $arItem):?>
        <li>
            <div>
                <a href="/trademarks/<?=$arItem['CODE']?>/">
                <img src="<?=$arItem["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arItem["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arItem["PREVIEW_PICTURE"]["HEIGHT"]?>" alt=""/>
                </a>
            </div>
        </li>
    <?endforeach?>                            
    </ul>
<?endif;?>