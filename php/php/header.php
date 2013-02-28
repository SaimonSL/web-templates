 <?php
session_cache_limiter('private');
session_cache_expire(30);
session_start();

require 'config.php';

if (DEPLOY == "DEVELOPMENT")
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
}

// LIB (Application)
if (DEPLOY != "PRODUCTION")
  foreach (glob("php/lib/*.php") as $filename)    include $filename;
else
  foreach (glob("php/lib/*_ready.php") as $filename)    include $filename;

SystemDatabase::OpenConnection();

// Classes (Model)
function __autoload($class_name)
{    include "php/classes/{$class_name}.php";   }

// Pages (Controller)
if (file_exists("php/pages/{$current_page_name}.php"))
    include "php/pages/{$current_page_name}.php";
    
 ?>
 <?php require 'php/html.php'; ?>