<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<h1>Продукция <?=$arResult["ELEMENT"]["NAME"]?></h1>
<div class="catalog">
<div class="cat-list">
<?
$TOP_DEPTH = $arResult["SECTION"]["DEPTH_LEVEL"];
$CURRENT_DEPTH = $TOP_DEPTH;
$CUR_PAGE = $APPLICATION->GetCurPage(false);

$cell = 0;
foreach($arResult["SECTIONS"] as $arSection):
        if ($cell%3 == 0):?>
	<ul>
        <?endif;?>
        <li id="<?=$this->GetEditAreaId($arSection['ID']);?>"><a href="<?=$arSection["SECTION_PAGE_URL"]?>?<?=$arResult["LINK_PROPERTY_SID"]?>=<?=$arResult["ELEMENT"]["ID"]?>"<?if ($arSection["SECTION_PAGE_URL"]==$CUR_PAGE):?> class="cur"<?endif;?>><?=$arSection["NAME"]?></a> [<?=$arSection["ELEMENT_CNT"]?>]</li>    
        <?
        $cell++;
        if ($cell%3 == 0):?>
	</ul>
        <?endif;
endforeach;
if ($cell%3 != 0):?>
	</ul>
      <?endif;?>
	<div class="clear_fix"></div>
</div>

<?
	foreach($arResult["SECTIONS"] as $arSection):
?><h3><?=$arSection["NAME"]?></h3>
<div class="production form">
	<ul>
<?
$cell=1;
?>
		<?foreach($arSection["ITEMS"] as $arElement):?>
		<li<?if (($cell>0 && $cell%5==0) || $cell==count($arSection["ITEMS"])):?> class="last"<?endif;?>>
<?
$cell++;
?>
			<div class="img">
					<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
				<a href="<?=$arElement["DETAIL_PAGE_URL"]."?".$arResult["LINK_PROPERTY_SID"]?>=<?=$arResult["ELEMENT"]["ID"]?>"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /></a>
					<?endif?>
			</div>
			<div class="title">
				<a href="<?=$arElement["DETAIL_PAGE_URL"]."?".$arResult["LINK_PROPERTY_SID"]?>=<?=$arResult["ELEMENT"]["ID"]?>?>"><?=$arElement["NAME"]?></a>
			</div>
			<div class="price">
				<span><?=FormatCurrency($arElement["PRICES"]["BASE"]["VALUE"])?></span> руб.
                                <form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
				<div class="in">
					<input type="text" name="quantity" value="1"/>&nbsp;шт.&nbsp;&nbsp;
					<input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
                                        <input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arElement["ID"]?>">
					<button type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>">В корзину</button>
				</div>
                                </form>
			</div>
			<div class="line"></div>
		</li>
            
		<?endforeach; // foreach($arResult["ITEMS"] as $arElement):?>

	</ul>
	<div class="patch"></div>
</div><!-- .production -->
<?
	endforeach;//foreach($arResult["SECTIONS"] as $arSection):
?>
</div><!-- .catalog -->
