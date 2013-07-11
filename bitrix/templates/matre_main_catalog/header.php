<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$curPage = $APPLICATION->GetCurPage(true);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" dir="ltr" lang="ru-RU">
<head profile="http://gmpg.org/xfn/11">
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle()?></title>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link href="/css/fonts.css" rel="stylesheet" />
<link href="/css/jquery.formstyler.css" rel="stylesheet" />
<link href="/css/style.css" rel="stylesheet" />
<!--[if lt IE 9]><link href="/css/ie.css" rel="stylesheet" /><![endif]-->
<script src="/js/jquery-ui-1.9.1.custom.min.js"></script>
<script src="/js/ui.select.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/okSlider.js"></script>
<script src="/js/jquery.formstyler.js"></script>
<script src="/js/main.js"></script>
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
			
			
                                   <?$APPLICATION->IncludeComponent("bitrix:system.auth.form","",Array(
                                        "REGISTER_URL" => "/personal/?register=yes",
                                        "FORGOT_PASSWORD_URL" => "",
                                        "PROFILE_URL" => "/personal/",
                                        "SHOW_ERRORS" => "Y" 
                                        )
                                    );?>

			
			<div class="clear_fix"></div>
		</div><!-- .wrap -->
	</div><!-- .top -->
	
	<div class="head wrap">
		
		<div class="logo">
                    <?$APPLICATION->IncludeFile(
                    	"/include/top_logo.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"�������")
                    );?>
		</div>
		
		<div class="phone">
                    <?$APPLICATION->IncludeFile(
                    	"/include/top_phone.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"�������")
                    );?>
			<a href="javascript:void(0)" class="dot">����������� ���</a>
			<?$APPLICATION->IncludeComponent("melcosoft:feedback", "callback", array(
                            "EVENT_ID" => "40",
                            "EMAIL_FIELDS" => array(),
                            "WRITE_IBLOCK" => "N",
                            "USE_GUEST_CAPTCHA" => "N",
                            "FORM_ID" => "call-back",
                            "REDIRECT_IF_SUCCESS" => "Y",
                            "REDIRECT_URL" => "/call-back/",
                            "AJAX_MODE" => "N",
                            "AJAX_OPTION_JUMP" => "N",
                            "AJAX_OPTION_STYLE" => "Y",
                            "AJAX_OPTION_HISTORY" => "N",
                            "AJAX_OPTION_ADDITIONAL" => ""
                            ),
                            false
                        );?>
			
		</div>
		
		<div class="worktime">
                 <?$APPLICATION->IncludeFile(
                    	"/include/top_time.php",
                    	Array(),
                    	Array("MODE"=>"text","NAME"=>"����� ������")
                );?>
		</div>
		
		<div class="cart">
<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small","",Array(
		"PATH_TO_BASKET" => "/personal/cart/",
		"PATH_TO_ORDER" => "/personal/order/"
	)
);?>
		</div>
		
		<div class="clear_fix"></div>
	</div><!-- .head -->
	
</div><!-- #header -->

<div class="wrap">
<div id="body">

<div id="section">
	
	<div class="box">
            <?$APPLICATION->IncludeComponent("bitrix:menu", "section_menu", array(
	"ROOT_MENU_TYPE" => "section",
	"MENU_CACHE_TYPE" => "N",
	"MENU_CACHE_TIME" => "3600",
	"MENU_CACHE_USE_GROUPS" => "Y",
	"MENU_CACHE_GET_VARS" => array(
	),
	"MAX_LEVEL" => "1",
	"CHILD_MENU_TYPE" => "left",
	"USE_EXT" => "Y",
	"DELAY" => "N",
	"ALLOW_MULTI_SELECT" => "N"
	),
	false
);?>
		<span class="fix"></span>
	</div>
	
	<div class="search">
		<form action="/search/" method="get">
			<input type="text" name="q" value="����� �� �����" onblur="if(this.value=='')this.value='����� �� �����';" onfocus="if(this.value=='����� �� �����'){this.value='';}"/><button type="submit"></button>
		</form>
	</div>
	
	<div class="clear_fix"></div>
	
	<i class="corner l"></i>
	<i class="corner r"></i>
	
	<div class="shadow"></div>
</div><!-- #section -->