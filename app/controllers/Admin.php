<?php
class Admin extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('productModel');
        $this->loginModel = $this->model('loginModel');
    }

    public function index()
    {
        if(isset($_SESSION['admin'])) {
        
        $this->view('Admin/product',$this->productModel->getProducts());
    }
        else {
            echo 'Access denied';
        }
    }
    public function addProduct(){
        if(isset($_SESSION['admin'])) {
        if(!isset($_POST['add'])){
            $this->view('Admin/addProduct');
        }
        else{
            // $filename= $this->imageUpload();
            $data=[
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'rating' => 0,
                'image' => ""
            ];
           
            if($this->productModel->createProduct($data)){
                echo 'Adding the product...';
                header("Location: ".URLROOT."/Admin/");
            }

        }} else {
            echo 'Access denied';
        }
    }
    public function updateProduct($product_id){
        if(isset($_SESSION['admin'])) {
        $product = $this->productModel->getProduct($product_id);
            if(!isset($_POST['update'])){
                $this->view('Admin/updateProduct',$product);
            }
            else{
            // $filename= $this->imageUpload();
            $data=[
                'name' => $_POST['name'],
                'price' => $_POST['price'],
                'description' => $_POST['description'],
                'rating' => 0,
                'image' => "",
                'product_id' => $product_id
            ];
            if($this->productModel->updateProduct($data)){
                echo 'Updating the product...';
                header("Location: ".URLROOT."/Admin/");
            }
            
            }
        } else {
            echo 'Access denied';
        }
    }
    public function deleteProduct($product_id){
        if(isset($_SESSION['admin'])) {
            if($this->productModel->delete($product_id)){
                echo "User deleting...";
            } else {
                echo "Request denied";
            }
            header("Location: ".URLROOT."/Admin/");
        } else {
            echo 'Access denied';
        }
    }
    

    public function user(){
        if(isset($_SESSION['admin'])) {
            $data = [
                'users' => $this->loginModel->getUsers()
            ];
            $this->view('Admin/user',$data);
        } else {
            echo 'Access denied';
        }
    }

    public function deleteUser($username){
        if(isset($_SESSION['admin'])) {
            if($this->loginModel->deleteUser($username)){
                echo "User deleting";
            } else {
                echo "Request denied";
            }
            header("Location: ".URLROOT."/Admin/user");
        } else {
            echo 'Access denied';
        }
    }
    public function logout(){
        unset($_SESSION['admin']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url='.URLROOT.'/Product/Login/">';
    }


}
?>