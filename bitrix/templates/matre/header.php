<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$curPage = $APPLICATION->GetCurPage(true);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" dir="ltr" lang="ru-RU">
<head profile="http://gmpg.org/xfn/11">
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle()?></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link href="<?=SITE_TEMPLATE_PATH?>/css/fonts.css" rel="stylesheet" />
<link href="<?=SITE_TEMPLATE_PATH?>/css/jquery.formstyler.css" rel="stylesheet" />
<link href="<?=SITE_TEMPLATE_PATH?>/css/style.css" rel="stylesheet" />
<!--[if lt IE 9]><link href="<?=SITE_TEMPLATE_PATH?>/css/ie.css" rel="stylesheet" /><![endif]-->
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery-ui-1.9.1.custom.min.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/ui.select.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.fancybox.pack.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/okSlider.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/jquery.formstyler.js"></script>
<script src="<?=SITE_TEMPLATE_PATH?>/js/main.js"></script>
</head>
<body>
<?$APPLICATION->ShowPanel()?>
<div id="layout">

<div id="header">
	
	<div class="top">
		<div class="wrap">
			
			<div class="menu">
                            <?$APPLICATION->IncludeComponent(
                                "bitrix:menu",
                                "top_menu",
                                Array(
                                    "ROOT_MENU_TYPE" => "top"
                                    )
                            );?> 
				<div class="clear_fix"></div>
			</div><!-- .menu -->
			
			<div class="user">
				<span class="lock"></span>
				<a href="" class="dot login" onclick="return false;">Войти в кабинет</a>
				<span class="sep"></span>
				<a href="">Регистрация</a>
				<div class="clear_fix"></div>
				<div id="login">
					<form action="#" method="post">
						<div class="in">
							<div class="value">Логин:</div>
							<input type="text" name=""/>
						</div>
						<div class="in">
							<div class="value">Пароль:</div>
							<input type="password" name=""/>
						</div>
						<div class="in">
							<button type="submit">Отправить</button>
						</div>
					</form>
				</div>
			</div>
			
			<div class="clear_fix"></div>
		</div><!-- .wrap -->
	</div><!-- .top -->
	
	<div class="head wrap">
		
		<div class="logo">
                    <?$APPLICATION->IncludeFile(
                    	"/include/top_logo.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Логотип")
                    );?>
		</div>
		
		<div class="phone">
                    <?$APPLICATION->IncludeFile(
                    	"/include/top_phone.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Телефон")
                    );?>
			<a href="" class="dot" onclick="return false;">Перезвоните мне</a>
			<div id="callback" class="form">
				<form action="#" method="post">
					<div class="in">
						<div class="value">Ваше имя:</div>
						<input type="text" name=""/>
					</div>
					<div class="in">
						<div class="value">Ваш номер телефона:</div>
						<input type="text" name=""/>
					</div>
					<div class="in">
						<button type="submit">Отправить</button>
					</div>
				</form>
			</div><!-- #callback -->
		</div>
		
		<div class="worktime">
                 <?$APPLICATION->IncludeFile(
                    	"/include/top_time.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"Время работы")
                );?>
		</div>
		
		<div class="cart">
			<div class="box">
				В корзине <a href="">15 товаров</a><br/>
				на сумму 500 000 руб.
			</div>
			<a href="" class="go">Оформить заказ</a>
		</div>
		
		<div class="clear_fix"></div>
	</div><!-- .head -->
	
</div><!-- #header -->

<div class="wrap">
<div id="body">

<div id="section">
	
	<div class="box">
		<ul>
			<li><a href="">Матрасы</a></li>
			<li><a href="">Элитные матрасы</a></li>
			<li><a href="">Ортопедические Основания</a></li>
			<li><a href="">Кровати</a></li>
			<li><a href="">аксессуары</a></li>
		</ul>
		<span class="fix"></span>
	</div>
	
	<div class="search">
		<form action="#" method="post">
			<input type="text" name="" value="Поиск по сайту" onblur="if(this.value=='')this.value='Поиск по сайту';" onfocus="if(this.value=='Поиск по сайту'){this.value='';}"/><button type="submit"></button>
		</form>
	</div>
	
	<div class="clear_fix"></div>
	
	<i class="corner l"></i>
	<i class="corner r"></i>
	
	<div class="shadow"></div>
</div><!-- #section -->