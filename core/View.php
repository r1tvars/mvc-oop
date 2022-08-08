<?php

/**
 * View class
 */
class View {
  protected $_head, $_body, $_siteTitle = SITE_TITLE, $_outputBuffer, $_layout = DEFAULT_LAYOUT;

  public function __construct(){

  }
  //show the view function
  public function render($viewName){
    $viewArray = explode('/', $viewName);
    $viewString = implode('/', $viewArray);
    if(file_exists(ROOT . '/app/views/' . $viewString . '.php')){
      include(ROOT . '/app/views/' . $viewString . '.php');
      include(ROOT . '/app/views/layouts/' . $this->_layout . '.php' );
    }else{
      die('The view "' . $viewName . '" does not exist');
    }
  }
  //load the content in view where specified
  public function content($type){
    if($type == 'head'){
      echo $this->_head;
    }elseif($type == 'body'){
      echo $this->_body;
    }
  }
  //OutputBuffer start for head or body
  public function start($type){
    $this->_outputBuffer = $type;
    ob_start();
  }
  //OutputBuffer end for head or body
  public function end(){
    if($this->_outputBuffer == 'head'){
      $this->_head = ob_get_clean();
    }elseif($this->_outputBuffer == 'body'){
      $this->_body = ob_get_clean();
    }else{
      die('Run the outputBuffer start method');
    }
  }

  public function siteTitle(){
    echo $this->_siteTitle;
  }

  public function setLayout($path){
    $this->_layout = $path;
  }
}
