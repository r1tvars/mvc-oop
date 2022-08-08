<?php
/**
 * Product controller
 */
class Product extends Controller{
    // construct controller name and function/action
    public function __construct($controller, $action){
        parent::__construct($controller, $action);
        $this->view->setLayout('default'); //set page layout
    }
    
    public function index(){
        $this->view->render('product/index');
    }
    //render new form view
    public function new(){   
        $this->view->render('product/new');
    }
    public function createcategory(){   
        $this->view->render('product/newcategory');
    }
    public function createnewcategory(){
        $data = $_POST;
        if(isset($_POST) && !empty($_POST)){
            $db = new DB();
            $name = $data['name'];
            $querry = $db->newCategory($name);
        }
        $this->view->render('product/newcategory');
    }
    public function storeproducts(){
        $data = $_POST;
        if(isset($_POST) && !empty($_POST)){
            $db = new DB();
            $name = $_POST['name'];
            $exists = $db->getExisting($name);
            if(!$exists){
                $querry = $db->newProduct($data);
                Router::redirect('');
            }
        }
    }
    //render list view
    public function list(){

        $this->view->render('product/list');
    }
    /**
    * recieves $_POST data from ajax request when delete button is pressed in the view
    */
    public function destroy(){
        $db = new DB();
        if(isset($_POST['where'])){
            foreach($_POST['where'] as $id){
                foreach($_POST['table'] as $table){
                    $deleteQuery = $db->delete($table, $id);
                    $deleteProduct = $db->delete('product', $id);
                }
            }
            header("Refresh:0");
            Router::redirect('');
        }
    }
    
}