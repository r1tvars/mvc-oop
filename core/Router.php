<?php
/* *
 *router needs work/
 * 
 * */
class Router{
  public static function route($url){
    //chek url for controller
    $controller = (isset($url[0]) && $url[0] != '') ? ucwords($url[0]) : DEFAULT_CONTROLLER;
    $controller_name = $controller;
    array_shift($url);
    //check url for action/function
    $action = (isset($url[0]) && $url[0] != '') ? $url[0] : 'index';
    $action_name = $controller;
    array_shift($url);
    
    //parameters
    $queryParameters = $url;
    if(class_exists($controller)){
      if(!empty($queryParameters)){
        Router::redirect(strtolower($controller).'/'.strtolower($action));
      }else{
        $dispatch = new $controller($controller_name, $action);
        if(method_exists($controller, $action)){
          call_user_func_array([$dispatch, $action], $queryParameters);//callback class with name from url
        }else{
          echo 'The page you are trying to reach does not exist :(<br>';
          echo "<a href=\"javascript:history.go(-1)\">Go Back</a>";
          // die('Method '. $action .' does not exist in the controller ' . $controller_name );
        }
      }
    }else{
      $controller = 'Product';
      $dispatch = new $controller($controller_name, $action);

      if(method_exists($controller, $action)){
        call_user_func_array([$dispatch, $action], $queryParameters);
      }else{
        $controller = 'Product';
      }
    }
  }

  public static function redirect($location) {
    if(!headers_sent()) {
      header('Location: '.PROOT.$location);
      exit();
    } else {
      echo '<script type="text/javascript">';
      echo 'window.location.href="'.PROOT.$location.'";';
      echo '</script>';
      echo '<noscript>';
      echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
      echo '</noscript>';exit;
    }
  }
}


