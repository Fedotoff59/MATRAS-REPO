<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>

					<div class="user">
<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();?>
<?
if ($arResult["FORM_TYPE"] == "login"):
?>
	<a href="/personal/?login=yes"><?=GetMessage("AUTH_LOGIN")?></a>
<?
	if($arResult["NEW_USER_REGISTRATION"] == "Y")
	{
?>
	<a href="<?=$arResult["AUTH_REGISTER_URL"]?>" class="signup"><?=GetMessage("AUTH_REGISTER")?></a>
<?
	}
?>
<?
else:
?>
	<a href="<?=$arResult['PROFILE_URL']?>" class="username"><?
	$name = trim($USER->GetFullName());
	if (strlen($name) <= 0)
		$name = $USER->GetLogin();
	$name = "Личный кабинет";

	echo htmlspecialcharsEx($name);
	?></a>
	<a href="<?=$APPLICATION->GetCurPageParam("logout=yes", Array("logout"))?>" class="logout"><?=GetMessage("AUTH_LOGOUT")?></a>
<?
endif;
?>
                                        </div>