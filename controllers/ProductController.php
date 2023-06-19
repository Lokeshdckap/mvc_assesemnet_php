<?php
 require 'models/Product.php';
class ProductController{

    private $productModel;
     
    public $error;

    public function __construct() {
        $this->productModel = new Product();

    }


    public function index(){
     
        return require 'views/index.php'.$this->error;
    }

    public function create(){

        if(empty($_POST['product_name']) && empty($_POST['sku']) && empty($_POST['product_image']) && empty($_POST['price']) && empty($_POST['brand']) && empty($_POST['manufacture_date'])){
            $_SESSION['All Field is required'] = "All Field is required";
            header('location:/');
        }
        else {
        $this->productModel->create($_POST,$_FILES);
          }
    }
    public function read(){
         $details = $this->productModel->read();
        return require 'views/list.php';
     }

   
     public function edit($id){
      $details =  $this->productModel->edit($id);
       return require 'views/edit.php';
    }


    public function update($id){
        $this->productModel->update($id,$_POST,$_FILES);
    }

    public function delete($id){
        $this->productModel->delete($id);

    }
}