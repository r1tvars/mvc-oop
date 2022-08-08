<?php
/**
 * Author: Ritvars Resnis;
 */
define('ROOT', dirname(__FILE__));

//load config and helper functions
require_once(ROOT.'/config/config.php');
require_once(ROOT .'/app/lib/helpers/functions.php');

// autoload classes
function autoload($className) {
  
  if(file_exists(ROOT . '/core/'. $className . '.php')){
    require_once(ROOT . '/core/'. $className . '.php');
    return true;
  }elseif(file_exists(ROOT . '/app/controllers/' . $className . '.php')){
      require_once(ROOT . '/app/controllers/' . $className . '.php');
      return true;
  }elseif(file_exists(ROOT . '/app/models/' . $className . '.php')){
      require_once(ROOT . '/app/models/' . $className . '.php');
      return true;
  }
  return false;
}
// register the autoload function
spl_autoload_register('autoload');
session_start();
// saving the url in a varable for request routing
$url = isset($_SERVER['PATH_INFO']) ? explode('/', ltrim($_SERVER['PATH_INFO'], '/')) : [];

// route the request
Router::route($url);
