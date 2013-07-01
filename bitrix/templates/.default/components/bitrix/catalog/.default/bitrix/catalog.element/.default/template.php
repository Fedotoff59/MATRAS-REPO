<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

<h1><?=$arResult["SECTION"]["NAME"]?></h1>

<div class="product">

<div class="box">
    
    <?if (is_array($arResult["PREVIEW_PICTURE"])):?>
	<div class="img">
            <?if (is_array($arResult["DETAIL_PICTURE"])):?>
		<a class="fancybox" href="<?=$arResult["DETAIL_PICTURE"]["SRC"]?>" title="">
            <?else:?>
		<a class="fancybox" href="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" title="">
            <?endif;?>
			<img src="<?=$arResult["PREVIEW_PICTURE"]["SRC"]?>" width="<?=$arResult["PREVIEW_PICTURE"]["WIDTH"]?>" height="<?=$arResult["PREVIEW_PICTURE"]["HEIGHT"]?>" alt=""/>
		</a>
	</div>
    <?endif;?>

	<div class="info form">
		<div class="inner">
                    
                    <h3><?=$arResult["NAME"]?></h3>
                    
                    <form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
			<div class="buy">
				
				<div class="price">
					<span><?=CurrencyFormat($arResult["PRICES"]["BASE"]["VALUE"])?></span> руб.
				</div>
				
				<div class="num">
					<strong>Кол-во:</strong>&nbsp;&nbsp;&nbsp;<input type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1">&nbsp;&nbsp;шт.
				</div>
				
				<div class="bt">
                                        <input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
                                        <input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arResult["ID"]?>">
					<button type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>">В корзину</button>
				</div>
				
				<div class="clear_fix"></div>
			</div>
                    </form>
                    
<?if (is_array($arResult["RELATED_PRODUCTS"])):?>
			<h3>Сопутствующие товары</h3>
			<div class="more">
                        <?foreach ($arResult["RELATED_PRODUCTS"] as $arItem):?>
				<div class="item">
					<a href="<?=$arItem["ELEMENT"]["DETAIL_PICTURE"]["SRC"]?>" class="photo fancybox"></a>
					<div class="title">
						<a href="<?=$arItem["ELEMENT"]["DETAIL_PAGE_URL"]?>"><?=$arItem["ELEMENT"]["NAME"]?></a><span><?=CurrencyFormat($arItem["PRICE"]["PRICE"])?></span> руб.
					</div>
                    <form action="<?=POST_FORM_ACTION_URI?>" method="post" enctype="multipart/form-data">
					<div class="m-buy">
                                                <input type="hidden" name="<?echo $arParams["ACTION_VARIABLE"]?>" value="BUY">
                                                <input type="hidden" name="<?echo $arParams["PRODUCT_ID_VARIABLE"]?>" value="<?echo $arItem["ELEMENT"]["ID"]?>">
						<input type="text" name="<?echo $arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1"> шт. <button type="submit" name="<?echo $arParams["ACTION_VARIABLE"]."ADD2BASKET"?>">В корзину</button>
					</div>
                    </form>
					<div class="clear_fix"></div>
				</div>
                        <?endforeach?>
                            
			</div><!-- .more -->
<?endif;?>                    
    
		</div><!-- .inner -->
	</div><!-- .info -->
        
	<div class="clear_fix"></div>
</div><!-- .box -->

<?if($arResult["DETAIL_TEXT"]):?>
<h3>Описание</h3>
<div class="descr">
    <?=$arResult["DETAIL_TEXT"]?>
</div>
<?endif?>

</div><!-- .product -->
