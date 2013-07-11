<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<div id="content" class="product">
<?
if($arParams['ADD_SECTIONS_CHAIN'] && !empty($arResult['NAME']))
{ 
   $arResult['SECTION']['PATH'][] = array(
   'NAME' => $arResult['NAME'], 
   'PATH' => ' '); 

   $component = $this->__component; 
   $component->arResult = $arResult; 
}
?>
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
                    ������ ������� (� � � � �)<br/>
                <select class="sel" id="select_<?=$arResult["ID"]?>">
                    <?foreach($arResult["OFFERS"] as $arOffer): $i = 1;?>
                        <?foreach($arOffer["DISPLAY_PROPERTIES"] as $pid=>$arProperty):
                            if($i % 5 == 0 || $i == 1) { 
                                if(isset($arResult['CUR_OFFER']) && ($arResult['CUR_OFFER'] == $arOffer['ID']))
                                    echo '<option id="size_'.$arOffer['ID'].'" selected>'; 
                                    else echo '<option id="size_'.$arOffer['ID'].'">'; 
                            } else {
                                    echo $arProperty["VALUE"];
                                    if($i % 4 != 0) echo ' x';
                                }?>
                            
                            <?if($i % 4 == 0) echo ' ��</option>'; $i++?>
                        <?endforeach?>
                    <?endforeach?>
		</select>
                </div>
                <?foreach($arResult["OFFERS"] as $arOffer):?>
                    <input type="hidden" id="buyurl_<?=$arOffer['ID']?>" value="<?=$arOffer["BUY_URL"]?>">
                    <input type="hidden" id="addurl_<?=$arOffer['ID']?>" value="<?=$arOffer["ADD_URL"]?>">
                    <input type="hidden" id="compareurl_<?=$arOffer['ID']?>" value="<?=$arOffer["COMPARE_URL"]?>">
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
					<span>����������:</span><input type="text" name="<?=$arParams["PRODUCT_QUANTITY_VARIABLE"]?>" value="1"/><button type="submit" class="cart">������</button>
				</form>
			</div>
			<div class="clear_fix"></div>
			
			<div class="link">
                            <a href="/catalog/?action=ADD_TO_COMPARE_LIST&id=<?=$arResult['ID']?>" class="compare" id="compare_<?=$arResult['ID']?>"><i></i>�������� � ���������</a><br/>
				<a href="<?=$arResult['BUY_URL']?>" class="click" id="buyoneclick_<?=$arResult['ID']?>" ><i></i>������ � 1 ����</a><br/>
				<a href="/articles/credit.php" class="credit"><i></i>������ � ������</a>
			</div>
			
		</div><!-- .info -->
		
		<div class="clear_fix"></div>
	</div><!-- .block -->
        <?if(isset($arResult['DETAIL_TEXT']) && !empty($arResult['DETAIL_TEXT'])):?>
            <h3>���������</h3>
	<?endif;?>
        <div class="structure">
            <?=$arResult['DETAIL_TEXT']?>
        </div>
</div>