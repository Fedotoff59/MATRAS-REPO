                            <?if (isset($arResult["EVENT_SEND_ID"])):
global $APPLICATION;
$APPLICATION->AddViewContent("content_header","<h3>Ваше сообщение отправлено</h3>");
			    endif;?>
<script>
function validateForm()
{
var name=document.forms["<?=$arParams["FORM_ID"]?>"]["MS_AUTHOR"].value;
if (name==null || name=="")
  {
//  alert("Введите имя");
  document.forms["<?=$arParams["FORM_ID"]?>"]["MS_AUTHOR"].focus();
  return false;
  }
var phone=document.forms["<?=$arParams["FORM_ID"]?>"]["MS_PHONE"].value;
if (phone==null || phone=="")
  {
//  alert("Введите номер телефона");
  document.forms["<?=$arParams["FORM_ID"]?>"]["MS_PHONE"].focus();
  return false;
  }
}
</script>

				
					<div class="in">
						<div class="value">Ваше имя:</div>
						<input type="text" name="MS_AUTHOR"/>
					</div>
					<div class="in">
						<div class="value">Ваш номер телефона:</div>
						<input type="text" name="MS_PHONE"/>
					</div>
					<div class="in">
						<button type="submit" onclick="return validateForm()">Отправить</button>
					</div>
				
