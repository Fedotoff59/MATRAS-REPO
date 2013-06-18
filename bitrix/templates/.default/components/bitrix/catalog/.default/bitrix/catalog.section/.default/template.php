<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?if($arParams["DISPLAY_TOP_PAGER"]):?>
	<?=$arResult["NAV_STRING"]?><br />
<?endif;?>
<?
$aFilter = "";
if (intval($_REQUEST["TRADEMARK"])>0)
	$aFilter = "?TRADEMARK=".intval($_REQUEST["TRADEMARK"]);
?>
<div class="production form">
	<ul>
<?
$cell=1;
?>
		<?foreach($arResult["ITEMS"] as $arElement):?>
		<?
		$this->AddEditAction($arElement['ID'], $arElement['EDIT_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_EDIT"));
		$this->AddDeleteAction($arElement['ID'], $arElement['DELETE_LINK'], CIBlock::GetArrayByID($arParams["IBLOCK_ID"], "ELEMENT_DELETE"), array("CONFIRM" => GetMessage('CT_BCS_ELEMENT_DELETE_CONFIRM')));
		?>
		<li<?if (($cell>0 && $cell%5==0) || $cell==count($arResult["ITEMS"])):?> class="last"<?endif;?> id="<?=$this->GetEditAreaId($arElement['ID']);?>">
<?
$cell++;
?>
			<div class="img">
					<?if(is_array($arElement["PREVIEW_PICTURE"])):?>
				<a href="<?=$arElement["DETAIL_PAGE_URL"].$aFilter?>"><img src="<?=$arElement["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arElement["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arElement["PREVIEW_PICTURE"]["HEIGHT"]?>" alt="<?=$arElement["NAME"]?>" title="<?=$arElement["NAME"]?>" /></a>
					<?endif?>
			</div>
			<div class="title">
				<a href="<?=$arElement["DETAIL_PAGE_URL"].$aFilter?>"><?=$arElement["NAME"]?></a>
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
<?if($arParams["DISPLAY_BOTTOM_PAGER"]):?>
	<br /><?=$arResult["NAV_STRING"]?>
<?endif;?>
