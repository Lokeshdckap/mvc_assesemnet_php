<?php

require 'connection.php';

class Product extends DB{
    
    public function create($data,$file) {

        $sku = $data['sku'];
        if($sku){
            $statement = $this->db->query("select * from products_details where sku ='$sku'");
            $exists = $statement->fetchAll(PDO::FETCH_OBJ);

            if($exists){
                $_SESSION['SKU Already Exists'] = "SKU Already Exists";
                header('Location:/');
            }

            else{

        // var_dump($file['image']['name']);
                $name = $data['product_name'];
                $sku = $data['sku'];
                $price = $data['price'];
                $brand = $data['brand'];
                $manufacture_date = $data['manufacture_date'];
                $stock = $data['stock'];

                $banner=$file['product_image']['name'];
                $bannerexptype=$banner;
                if($bannerexptype){
                $bannerpath="images/".$bannerexptype;
                }

        move_uploaded_file($file["product_image"]["tmp_name"],$bannerpath);

        $ins = $this->db->prepare("INSERT INTO products_details(product_name,product_image,sku,price,brand,manufacture_date,available_stock)VALUES('$name','$bannerpath','$sku','$price','$brand','$manufacture_date','$stock')");
        $ins->execute();
        session_destroy();
        header('location:/list');
            }
        }
        
    }
    public function read() {
        $statement = $this->db->prepare("SELECT *  FROM products_details");
        $statement->execute();
        $details = $statement->fetchAll(PDO::FETCH_OBJ);
        return $details;
    }

    public function edit($id){
        $statement = $this->db->prepare("SELECT *  FROM products_details WHERE id= $id");
        $statement->execute();
        $details = $statement->fetchAll(PDO::FETCH_OBJ);
        return $details;
    }

    public function update($id,$data,$file){
        // var_dump($data);
        $name = $data['product_name'];
        $sku = $data['sku'];
        $price = $data['price'];
        $brand = $data['brand'];
        $manufacture_date = $data['manufacture_date'];
        $stock = $data['stock'];

        $banner=$file['product_image']['name'];

        $bannerexptype=$banner;
        if($bannerexptype){
        $bannerpath="images/".$bannerexptype;
    }
    if (file_exists($bannerpath)) 
    {
      unlink($bannerpath);
    }
    move_uploaded_file($file["product_image"]["tmp_name"],$bannerpath);
    // if (file_exists($bannerpath)) 
    // {
    //   unlink($bannerpath);
    //    echo "File Successfully Delete."; 
    // }
    // else
    // {
    //    echo "File Successfully not exists."; 
    // }
        $statement = $this->db->prepare("UPDATE products_details SET product_name='$name',product_image='$bannerpath',sku='$sku',price='$price',brand='$brand',manufacture_date ='$manufacture_date',available_stock='$stock' WHERE id= $id");
        $statement->execute();
        header('location:/list');
     

    }


    public function delete($id) {
        $statement = $this->db->prepare("DELETE FROM products_details WHERE id=$id");
        $statement->execute();
        header('location:/list');
    }


}