<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

$arComponentDescription = array(
	"NAME" => "������ �������� ���������",
	"DESCRIPTION" => "������ �������� ���������",
	"ICON" => "/images/news_line.gif",
	"SORT" => 10,
	"CACHE_PATH" => "Y",
	"PATH" => array(
		"ID" => "content",
		"CHILD" => array(
			"ID" => "MS",
			"NAME" => "MS",
			"SORT" => 10,
		)
	),
);

?>