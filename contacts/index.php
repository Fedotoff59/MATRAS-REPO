<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("��������");
?> 
<h1>��������</h1>
 
<div> �  </div>
 ���� ��������: 
<br />
 +7 (495) 765-15-50 
<br />
 +7 (495) 762-44-52 
<br />
 
<br />
 E-mail:� <a href="mailto:shop@solomon-stroy.ru" >shop@solomon-stroy.ru</a> 
<br />
 
<br />
 �� ��������� ����������� �� ���� ��������, ��������� � ������� ����� ��������,������������ � ����������� � ����� ����������. �������.  
<br />
 
<h2>�������� �����</h2>
 
<br />
 <?$APPLICATION->IncludeComponent(
	"melcosoft:feedback",
	".default",
	Array(
		"EVENT_ID" => "7",
		"EMAIL_FIELDS" => array(0=>"AUTHOR_EMAIL",),
		"WRITE_IBLOCK" => "Y",
		"IBLOCK_ID" => "9",
		"ELEMENT_NAME" => "#AUTHOR# - #AUTHOR_EMAIL#",
		"USE_GUEST_CAPTCHA" => "Y",
		"FORM_ID" => "feedback",
		"AJAX_MODE" => "N",
		"AJAX_OPTION_JUMP" => "N",
		"AJAX_OPTION_STYLE" => "Y",
		"AJAX_OPTION_HISTORY" => "N",
		"AJAX_OPTION_ADDITIONAL" => ""
	)
);?> 
<br />
 <?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>