<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Title");
?><?$APPLICATION->IncludeComponent("bitrix:sale.personal.order", ".default", Array(
	"SEF_MODE" => "N",	// �������� ��������� ���
	"ORDERS_PER_PAGE" => "20",	// ���������� ������� �� ����� ��������
	"PATH_TO_PAYMENT" => "payment.php",	// �������� ����������� ��������� �������
	"PATH_TO_BASKET" => "basket.php",	// �������� � ��������
	"SET_TITLE" => "Y",	// ������������� ��������� ��������
	"SAVE_IN_SESSION" => "Y",	// ��������� ��������� ������� � ������ ������������
	"NAV_TEMPLATE" => "",	// ��� ������� ��� ������������ ���������
	"PROP_1" => "",	// �� ���������� �������� ��� ���� ����������� "�����" (s1)
	),
	false
);?><?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>