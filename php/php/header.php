 <?php

require 'config.php';


if (DEPLOY == "DEVELOPMENT")
{
  error_reporting(E_ALL);
  ini_set('display_errors', '1');
}


chdir(dirname(realpath( __FILE__ ))."..");

// LIB
foreach (glob("php/lib/*_deploy.php") as $filename)
  include $filename;


// Classes
function __autoload($class_name)
{    include "php/classes/{$class_name}.php";   }


 ?>