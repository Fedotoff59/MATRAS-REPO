<?
$arUrlRewrite = array(
	array(
		"CONDITION"	=>	"#^/manufacturers/#",
		"RULE"	=>	"",
		"ID"	=>	"melcosoft:splitcatalog",
		"PATH"	=>	"/manufacturers/index.php",
	),
	array(
		"CONDITION"	=>	"#^/articles/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:news",
		"PATH"	=>	"/articles/index.php",
	),
	array(
		"CONDITION"	=>	"#^/catalog/#",
		"RULE"	=>	"",
		"ID"	=>	"bitrix:catalog",
		"PATH"	=>	"/catalog/index.php",
	),
);

?>