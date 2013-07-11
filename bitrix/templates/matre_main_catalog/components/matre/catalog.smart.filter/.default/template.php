<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<script type="text/javascript">
    $(document).ready(function(){
    	$('#price .box').slider({
		range: true, 
                min: <?=$arResult['MIN_PRICE']?>, 
                max: <?=$arResult['MAX_PRICE']?>, 
                values: [<?=$arResult['FORMATED_MIN_PRICE']?>, 
                        <?=$arResult['FORMATED_MAX_PRICE']?>], 
                slide: function(event, ui) {
			
			$('#price #start').val(ui.values[0]);
			$('#price #end').val(ui.values[1]);
		}
	});
    });
</script>
		<div class="sub">
			<h3>Подбор по параметрам</h3>
		</div>
		<form action="/catalog/" method="GET">
                <input type="hidden" name="CATALOGFILTER" value="Y">
		<div class="item">
			<div class="level">Размер матраса</div>
			<select name="size">
                            <option>Неважно</option>
                            <?foreach ($arResult['FORMAT_SIZSES'] as $selflag => $stSize):?>
				<?if(isset($arResult['SELECTED_SIZE']) && ($arResult['SELECTED_SIZE'] == $selflag)):?>
                                    <option selected><?=$stSize?></option>
                                <?else:?>
                                    <option><?=$stSize?></option>
                                <?endif?>    
                            <?endforeach?>
			</select>
		</div>
		
		<div class="item" id="price">
			<div class="level">Цена</div>
			от:&nbsp;<input type="text" name="min_price" id="start" value="<?=$arResult['FORMATED_MIN_PRICE']?>"/>&nbsp;до:&nbsp;<input type="text" name="max_price" id="end" value="<?=$arResult['FORMATED_MAX_PRICE']?>"/>
			<div class="box"></div>
		</div>
		
		<div class="item">
			<div class="level">Бренд</div>
                        <?foreach($arResult['TRADEMARKS'] as $id => $Trademark):?>
			<div class="li">
                            <label><input type="checkbox" name="brand_<?=$id?>" id="brand_<?=$id?>" <?=$arResult['CHECKED_BARNDS'][$id]?> /> <?=$Trademark?></label>
			</div>
                        <?endforeach?>    
		</div>
		
		<div class="item">
			<div class="level">Основа матраса</div>
			<select name="matrebase">
				<option id="base_0">Неважно</option>
                                <?foreach($arResult['MATREBASE'] as $id => $MatreBase):?>
                                <?if(isset($arResult['SELECTED_BASE']) && ($arResult['SELECTED_BASE'] == $id)):?>
                                    <option id="base_<?=$id?>" selected><?=$MatreBase?></option>
                                <?else:?>    
                                    <option id="base_<?=$id?>"><?=$MatreBase?></option>
                                <?endif?>
                                <?endforeach?>
			</select>
		</div>
		
		<div class="bt">
			<button type="submit">Показать 25 товаров</button>
		</div>
                </form>