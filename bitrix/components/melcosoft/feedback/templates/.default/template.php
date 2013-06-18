<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
//print_r($arResult);
?>

	<div class="product">
		<div class="w_block">
			
			<div class="l">
                            
                            <?if (isset($arResult["EVENT_SEND_ID"])):?>
                            <h3>Ваше сообщение отправлено</h3>
                            <?endif;?>
                            <?if ($arResult["FORM_ERROR"]):?>
                            <h3><font color="red"><?=$arResult["FORM_ERROR_MSG"]?></font></h3>
                            <?endif?>
				
                            <?if (!isset($arResult["EVENT_SEND_ID"])):?>
				<div class="form">
					
					<div class="tr">
						Ваше имя:<br/>
						<input type="text" name="MS_AUTHOR" value="<?=htmlspecialcharsEx($arResult["FORM"]["AUTHOR"])?>"/>
					</div>
					
					<div class="tr">
						Ваш E-mail:<br/>
						<input type="text" name="MS_AUTHOR_EMAIL" value="<?=htmlspecialcharsEx($arResult["FORM"]["AUTHOR_EMAIL"])?>"/>
					</div>
					
					<div class="tr">
						Ваш вопрос:<br/>
						<textarea name="MS_TEXT" rows="4" cols="40"><?=htmlspecialcharsEx($arResult["FORM"]["TEXT"])?></textarea>
					</div>
				
                                    <?if (isset($arResult["CAPTCHA_IMAGE"])):?>
					<div class="tr">
						Введите символы с картинки<br/><?=$arResult["CAPTCHA_IMAGE"]?><br/><br/>
						<input type="text" name="CAPTCHA" value=""/>
					</div>
                                    <?endif;?>
                                    
					<div class="tr">
						<button type="submit">Отправить</button>
					</div>
					
				</div>
                            <?endif?>
			</div>
		</div><!-- .w_block -->
	</div>
        
