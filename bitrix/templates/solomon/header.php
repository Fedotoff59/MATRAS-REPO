<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
$curPage = $APPLICATION->GetCurPage(true);
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:og="http://opengraphprotocol.org/schema/" xmlns:fb="http://www.facebook.com/2008/fbml" dir="ltr" lang="ru-RU">
<head profile="http://gmpg.org/xfn/11">
<?$APPLICATION->ShowHead();?>
<title><?$APPLICATION->ShowTitle()?></title>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
<link href="/css/fonts.css" rel="stylesheet" type="text/css" />
<link href="/css/style.css" rel="stylesheet" type="text/css" />
<!--[if IE 7]><link rel="stylesheet" type="text/css" href="/css/ie7.css" /><![endif]-->
<script type="text/javascript" src="/js/jquery-ui-1.9.1.custom.min.js"></script>
<script type="text/javascript" src="/js/ui.select.js"></script>
<script type="text/javascript" src="/js/jquery.fancybox.pack.js"></script>
<script type="text/javascript" src="/js/carousel.js"></script>
<script type="text/javascript" src="/js/jquery.formstyler.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
<meta name="format-detection" content="telephone=no" />
<meta name='yandex-verification' content='609812a2360efea6' />
</head>
<body>
<?$APPLICATION->ShowPanel()?>

<div id="layout">

<div id="header">
	
	<div class="bg"></div>
	
	<div class="wrap tp">
		
		<div class="logo">
			<a href="/"><img src="/i/logo.png" alt="Logo"/></a>
		</div>
		
		<ul>
			<li class="cart">
				<div class="box">
<?$APPLICATION->IncludeComponent("bitrix:sale.basket.basket.small", ".default", array(
	"PATH_TO_BASKET" => "/personal/cart/",
	"PATH_TO_ORDER" => "/personal/order.php"
	),
	false
);?>
<?$APPLICATION->IncludeComponent("bitrix:system.auth.form", ".default", array(
	"REGISTER_URL" => "/personal/?register=yes",
	"FORGOT_PASSWORD_URL" => "/personal/?forgot_password=yes",
	"PROFILE_URL" => "/personal/",
	"SHOW_ERRORS" => "N"
	),
	false
);?>
				</div>
			</li>
			<li class="mail">
				<div class="box">
					<div class="tl">e-mail:</div>
<?$APPLICATION->IncludeFile(
                    	"/include/top_email.php",
                    	Array(),
                    	Array("MODE"=>"html","NAME"=>"�����")
                    );?>					
					<a href="/feedback/">�������� �����</a>
				</div>
				<div class="clear_fix"></div>
			</li>
			<li class="phone">
				<div class="box">
<?$APPLICATION->IncludeFile(
                    	"/include/top_phones.php",
                    	Array(),
                    	Array("MODE"=>"html","NAME"=>"��������")
                    );?>					
					<a href="" onclick="return false;">����� �����������</a>
				</div>
				<div class="clear_fix"></div>
				<div class="hd form">
<?$APPLICATION->IncludeComponent("melcosoft:feedback", "callback", array(
	"EVENT_ID" => "40",
	"EMAIL_FIELDS" => array(),
	"WRITE_IBLOCK" => "N",
	"USE_GUEST_CAPTCHA" => "N",
	"FORM_ID" => "callback",
	"REDIRECT_IF_SUCCESS" => "Y",
	"REDIRECT_URL" => "/call-back/",
	"AJAX_MODE" => "N",
	"AJAX_OPTION_JUMP" => "N",
	"AJAX_OPTION_STYLE" => "Y",
	"AJAX_OPTION_HISTORY" => "N",
	"AJAX_OPTION_ADDITIONAL" => ""
	),
	false
);?>				</div><!-- .hd -->
			</li>
		</ul>
		
		<div class="clear_fix"></div>
	</div><!-- .tp -->
	
	<div class="bt">
		
		<div class="wrap">
<?$APPLICATION->IncludeComponent("bitrix:menu", "index", Array(
	"ROOT_MENU_TYPE" => "top",	// ��� ���� ��� ������� ������
	"MAX_LEVEL" => "1",	// ������� ����������� ����
	"CHILD_MENU_TYPE" => "left",	// ��� ���� ��� ��������� �������
	"USE_EXT" => "N",	// ���������� ����� � ������� ���� .���_����.menu_ext.php
	"DELAY" => "N",	// ����������� ���������� ������� ����
	"ALLOW_MULTI_SELECT" => "N",	// ��������� ��������� �������� ������� ������������
	"MENU_CACHE_TYPE" => "N",	// ��� �����������
	"MENU_CACHE_TIME" => "3600",	// ����� ����������� (���.)
	"MENU_CACHE_USE_GROUPS" => "Y",	// ��������� ����� �������
	"MENU_CACHE_GET_VARS" => "",	// �������� ���������� �������
	),
	false
);?>			
	
			<div class="search">
				<div class="in">
<form action="/search/" method="get">
					<input type="text" name="q" value="����� �� �������� �������" onblur="if(this.value=='')this.value='����� �� �������� �������';" onfocus="if(this.value=='����� �� �������� �������'){this.value='';}"/><button type="submit"></button>
</form>
				</div>
			</div>
			
			<div class="clear_fix"></div>
		</div>
		
	</div><!-- .bt -->
	
</div><!-- #header -->


<div id="body" class="wrap">

<?if ($curPage == SITE_DIR."index.php"):?>
<?else:?>
<?$APPLICATION->IncludeComponent(
	"bitrix:breadcrumb",
	".default",
	Array(
		"START_FROM" => "0",
		"PATH" => "",
		"SITE_ID" => "-"
	),
false
);?>

<div id="content">

<?endif;?>

<?$APPLICATION->ShowViewContent("content_header");?>