<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent("bitrix:main.profile", ".default", Array(
	"USER_PROPERTY_NAME" => "",	// �������� �������� � ���. ����������
	"SET_TITLE" => "Y",	// ������������� ��������� ��������
	"AJAX_MODE" => "N",	// �������� ����� AJAX
	"USER_PROPERTY" => "",	// ���������� ���. ��������
	"SEND_INFO" => "N",	// ������������ �������� �������
	"CHECK_RIGHTS" => "N",	// ��������� ����� �������
	"AJAX_OPTION_JUMP" => "N",	// �������� ��������� � ������ ����������
	"AJAX_OPTION_STYLE" => "Y",	// �������� ��������� ������
	"AJAX_OPTION_HISTORY" => "N",	// �������� �������� ��������� ��������
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>