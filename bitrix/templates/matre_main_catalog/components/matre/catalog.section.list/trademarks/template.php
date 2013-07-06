<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<ul>
<?print_r($arParams['IBLOCK_TYPE']);foreach($arResult["SECTIONS"] as $cell => $arSection):?>
<li>
    <a href="<?=$arSection["SECTION_PAGE_URL"]?>">
        <div class="img">
            <?if (is_array($arSection["PICTURE"])):?><img src="<?=$arSection["PICTURE"]["SRC"]?>" width="<?=$arSection["PICTURE"]["WIDTH"]?>" height="<?=$arSection["PICTURE"]["HEIGHT"]?>" alt=""/><?endif;?>
        </div>
    </a>
</li>
<?endforeach;?>
</ul>