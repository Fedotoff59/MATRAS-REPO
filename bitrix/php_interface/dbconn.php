<?
define("DBPersistent", false);
$DBType = "mysql";
$DBHost = "localhost";
#$DBLogin = "******";
#$DBLogin = "******";
$DBLogin = "srv34072_matras";


#$DBPassword = "******";
#$DBPassword = "******";
$DBPassword = "x7T4mtGJ";


#$DBName = "******";
#$DBName = "******";
$DBName = "srv34072_matras";


$DBDebug = false;
$DBDebugToFile = false;

@set_time_limit(60);

define("DELAY_DB_CONNECT", true);
define("CACHED_b_file", 3600);
define("CACHED_b_file_bucket_size", 10);
define("CACHED_b_lang", 3600);
define("CACHED_b_option", 3600);
define("CACHED_b_lang_domain", 3600);
define("CACHED_b_site_template", 3600);
define("CACHED_b_event", 3600);
define("CACHED_b_agent", 3660);
define("CACHED_menu", 3600);

define("BX_FILE_PERMISSIONS", 0644);
define("BX_DIR_PERMISSIONS", 0755);
@umask(~BX_DIR_PERMISSIONS);
@ini_set("memory_limit", "512M");
define("BX_DISABLE_INDEX_PAGE", true);
define("LOG_FILENAME", $_SERVER["DOCUMENT_ROOT"]."/log.txt");
?>