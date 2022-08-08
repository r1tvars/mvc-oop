<?php 
 /**
 * Pretty basic stuff for querying and deleteing rows from database.
 * Simple connection to the database in the constructor.
 */
class DB{
  public function __construct(){
    $dbHost = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "categories";
    $this->connect = mysqli_connect($dbHost, $dbUsername, $dbPassword, $dbName);
    if(!$this->connect){
      echo 'Database connection error: '. mysqli_connect_error($this->connect);
    }
      
  }
  // insert data in database
  public function insert($table, $data){
    $string = "INSERT INTO ". $table ." (";
    $string .= implode(",", array_keys($data)). ') VALUES (';
    $string .= "'".implode("','", array_values($data)). "')";
    if(mysqli_query($this->connect, $string)){
      return true;
    }else{
      echo mysqli_error($this->connect);
    }
  }

  public function newCategory($data){
    $query = "INSERT INTO categories (name) VALUES ('".$data."')";
    if(mysqli_query($this->connect, $query)){
      return true;
    }else{
      echo mysqli_error($this->connect);
    }
  }
  public function newProduct($data){
    $query = "INSERT INTO products (cat_id, name, price, currency) VALUES (".$data['type'].",'".$data['name']."','".$data['price']."','".$data['currency']."')";
    if(mysqli_query($this->connect, $query)){
      return true;
    }else{
      echo mysqli_error($this->connect);
    }
  }

  public function getCategory(){
    $query = "SELECT ID, name FROM categories ORDER BY ID DESC";
    $result = mysqli_query($this->connect, $query);
    while($row = mysqli_fetch_assoc($result)){
      $data[] = $row;
    }
    return $data;
  }
  // index/list data from database
  public function index(){
    $data = [];
    $query = "SELECT
      *
    FROM 
      products 
    ORDER BY
      ID DESC";
    $result = mysqli_query($this->connect, $query);
    while($row = mysqli_fetch_assoc($result)){
      $data[] = $row;
    }
    return $data;
  }
  // delete data from database based on parameters
  public function delete($table, $where) {
    $string = "DELETE FROM products WHERE ID = ". $where ."";
    if(mysqli_query($this->connect, $string)){
      return true;
    }else{
      echo mysqli_error($this->connect);
    }
  }  
  // check if there is an existing row in database with provided SKU
  public function getExisting($name){
    $query = "SELECT * FROM products WHERE name='".$name."'";
    $result = mysqli_query($this->connect, $query);
    if (!$result){
      die('Error: ' . mysqli_error($this->connect));
    }elseif(mysqli_num_rows($result) > 0){
      header("location:new?exists=Exists");
      die();
    }
  }
  
}


