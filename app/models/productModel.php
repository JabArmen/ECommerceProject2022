<?php

    class productModel{
        public function __construct(){
            $this->db = new Model;
        }
        public function getProducts(){
            $this->db->query("SELECT * FROM product");
            return $this->db->getResultSet();
        }

        public function getProduct($product_id){
            $this->db->query("SELECT * FROM product WHERE product_id = :product_id");
            $this->db->bind(':product_id',$product_id);
            return $this->db->getSingle();
        }

        public function createProduct($data){
            $this->db->query("INSERT INTO product (Name, City, Phone, Picture) values (:name, :description, :price, :image, :rating)");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':image',$data['image']);
            $this->db->bind(':rating',$data['rating']);
            

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function updateProduct($data){
            $this->db->query("UPDATE product SET name=:name, description=:description, price=:price, image=:image, rating=:rating WHERE product_id=:product_id");
            $this->db->bind(':name', $data['name']);
            $this->db->bind(':description', $data['description']);
            $this->db->bind(':price', $data['price']);
            $this->db->bind(':image',$data['image']);
            $this->db->bind(':rating',$data['rating']);
            $this->db->bind('product_id',$data['product_id']);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function delete($data){
            $this->db->query("DELETE FROM product WHERE product_id=:product_id");
            $this->db->bind('product_id', $data['product_id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
    }
