<?php
/**
 * Description of database
 *
 * @author saimon lovell
 */
date_default_timezone_set('America/New_York');

chdir(dirname(realpath( __FILE__ ))); chdir("..");

define("DEPLOY", "DEVELOPMENT");
define("MYSQL_DATABASE_CONNECTION", "");
define("MYSQL_DATABASE_NAME", "");
define("MYSQL_DATABASE_USER", "");
define("MYSQL_DATABASE_PASSWORD", "");

$ip = $_SERVER['REMOTE_ADDR'];
$ssid = session_id();

$current_page = $_SERVER['PHP_SELF'];
$current_page = substr($current_page, strrpos($current_page, "/") + 1);
$current_page_name = substr($current_page, 0, strpos($current_page, '.'));

?>