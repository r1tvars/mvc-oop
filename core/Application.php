<?php
/**
 * Application constructs error reporting & unregisters globals
 */
class Application{
  function __construct(){
    $this->_set_reporting();
    $this->_unregister_globals();
  }

  private function _set_reporting(){
    if(DEBUG){
      error_reporting(E_ALL);
      ini_set('display_errors', 1);
    }else{
      error_reporting(0);
      ini_set('display_errors', 0);
      ini_set('log_errors', 1);
      ini_set('error_log', ROOT . '/tmp/logs/errors.log');
    }
  }

  private function _unregister_globals(){
    if(ini_get('register_globals')){
      $gloabalsArray = ['_SESSION', '_COOKIE', '_GET', 'REQUEST', '_SERVER', '_ENV', '_FILES'];
      foreach ($gloabalsArray as $gloal) {
        foreach($GLOBALS[$g] as $k => $v){
          if($GLOBALS[$k] === $v){
            unset($GLOBALS[$k]);
          }
        }
      }
    }
  }
}
