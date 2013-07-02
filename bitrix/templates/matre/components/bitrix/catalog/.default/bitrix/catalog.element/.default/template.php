<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="content" class="product">
<?$APPLICATION->IncludeComponent("bitrix:breadcrumb", ".default", array(), false)?>	
<h1><?=$arResult["NAME"]?></h1>
	<div class="block">
		
		<div class="photo">
			
			<div class="big">
                            <a class="fancybox" rel="photo1" href="<?=$arResult['DETAIL_PICTURE']['SRC']?>">
				<img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt=""/>
                            </a>                                			
                                <?if (is_array($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'])):?>
                                    <?foreach($arResult['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'] as $arPhoto):?>
                                        <a class="fancybox" rel="photo1" href="<?=$arPhoto['SRC']?>"></a>
                                    <?endforeach?>
                                <?endif?>
			</div>
			<?if (is_array($arResult['DISPLAY_PROPERTIES']['PHOTOS']['VALUE'])):?>
			<ul>
				<li class="cur"><img src="<?=$arResult['DETAIL_PICTURE']['SRC']?>" rel="<?=$arResult['DETAIL_PICTURE']['SRC']?>" alt=""/><i></i></li>
				<?foreach($arResult['DISPLAY_PROPERTIES']['PHOTOS']['FILE_VALUE'] as $arPhoto):?>
                                    <li><img src="<?=$arPhoto['SRC']?>" rel="<?=$arPhoto['SRC']?>" alt=""/><i></i></li>
                                <?endforeach?>
			</ul>
                        <?endif?>
			<div class="clear_fix"></div>
			
		</div><!-- .photo -->
		
		<div class="info">			
			<div class="text">
				<?=$arResult['PREVIEW_TEXT']?>
			</div>
                <?if(is_array($arResult["OFFERS"]) && !empty($arResult["OFFERS"])):?>
                <div class="size">
                    Размер матраса (см х см х см)<br/>
                <select class="sel" id="select_<?=$arResult["ID"]?>">
                    <?foreach($arResult["OFFERS"] as $arOffer): $i = 1;?>
                        <?foreach($arOffer["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
                            if($i % 5 == 0 || $i == 1) 
                                echo '<option id ="size_'.$arOffer['ID'].'">'; 
                                else {
                                    echo $arProperty["VALUE"];
                                    if($i % 4 != 0) echo ' x';
                                }?>
                            
                            <?if($i % 4 == 0) echo ' см</option>'; $i++?>
                        <?endforeach?>
                    <?endforeach?>
		</select>
                </div>
                <?foreach($arResult["OFFERS"] as $arOffer):?>                    
                    <?foreach($arOffer["PRICES"] as $code=>$arPrice):?>
                        <?if($arPrice["CAN_ACCESS"]):?>
                                <input type="hidden" id="price_<?=$arOffer['ID']?>" value="<?=$arPrice["PRINT_VALUE"]?>">
                        <?endif;?>
                    <?endforeach;?>
                <?endforeach;?>
                <?endif?>
			
			<div class="price" id="price_<?=$arResult["ID"]?>">
				<?=$arResult['PRICES']['BASE']['PRINT_VALUE']?>
			</div>
			
			<div class="buy">
                            <form action="<?=$arResult['ADD_URL']?>" method="post" id="buyform_<?=$arResult['ID']?>">
					<span>Количество:</span><input type="text" name="<?=$arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1"/><button type="submit" class="cart">Купить</button>
				</form>
			</div>
			<div class="clear_fix"></div>
			
			<div class="link">
				<a href="" class="compare"><i></i>Добавить к сравнению</a><br/>
				<a href="<?=$arResult['BUY_URL']?>" class="click" id="buyoneclick_<?=$arResult['ID']?>" ><i></i>КУПИТЬ В 1 КЛИК</a><br/>
				<a href="/articles/credit.php" class="credit"><i></i>Купить в кредит</a>
			</div>
			
		</div><!-- .info -->
		
		<div class="clear_fix"></div>
	</div><!-- .block -->
        <h3>Структура</h3>
	<div class="structure">
            <?=$arResult['DETAIL_TEXT']?>
        </div>


</div>