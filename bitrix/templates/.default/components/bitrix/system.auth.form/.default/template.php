<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

					<div class="user">
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if ($arResult["FORM_TYPE"] == "login"):
?>
	<span class="lock"></span>
	<a href="#" class="dot login" onclick="return false;"><?=GetMessage("AUTH_LOGIN")?></a><span class="sep"></span>
<?
	if($arResult["NEW_USER_REGISTRATION"] == "Y")
	{
?>
	<a href="<?=$arResult["AUTH_REGISTER_URL"]?>"><?=GetMessage("AUTH_REGISTER")?></a>
<?
	}
?>
        <div class="clear_fix"></div>
        <div id="login">
            <form action="/personal/?login=yes" method="post">
                <?
                foreach ($arResult["POST"] as $key => $value)
                {
                ?>
                <input type="hidden" name="<?=$key?>" value="<?=$value?>" />
                <?
                }
                ?>
                <input type="hidden" name="AUTH_FORM" value="Y" />
                <input type="hidden" name="TYPE" value="AUTH" />
                <div class="in">
                    <div class="value" >Логин:</div>
                        <input type="text" name="USER_LOGIN"/>
                    </div>
		<div class="in">
                    <div class="value">Пароль:</div>
                        <input type="password" name="USER_PASSWORD"/>
                    </div>
		<div class="in">
                    <button type="submit" name="Login">Отправить</button>
		</div>
            </form>
	</div>
<?
else:
?>
        <span class="lock"></span>
	<a href="<?=$arResult['PROFILE_URL']?>" class="username"><?
	$name = trim($USER->GetFullName());
	if (strlen($name) <= 0)
		$name = $USER->GetLogin();
	$name = "Личный кабинет";

	echo htmlspecialcharsEx($name);
	?></a>
        <span class="sep"></span>
	<a href="<?=$APPLICATION->GetCurPageParam("logout=yes", Array("logout"))?>" class="logout"><?=GetMessage("AUTH_LOGOUT")?></a>
<?
endif;
?>
                                        </div>