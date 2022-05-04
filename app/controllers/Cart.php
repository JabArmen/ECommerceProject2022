<?php
class Cart extends Controller
{
    public function __construct()
    {
        $this->productModel = $this->model('productModel');
        $this->loginModel = $this->model('loginModel');
    }

    public function index()
    {
        $this->view('Cart/home',$this->productModel);
    }
    
    public function address() {
        $data ['address'] = $this->loginModel->getUser($_SESSION['user_username'])->address;
        $data ['loginModel'] = $this->loginModel;
        if(isset($_POST['submit'])){
            if($data['address'] == '') 
                $this->loginModel->editAddress( $_POST['address']);
            $_SESSION['checkout'] = true;
            header("Location: ".URLROOT."/Cart/payment");
        }
        $this->view('Cart/address', $data);
    }

    public function payment() {
        if(!isset($_SESSION['checkout'])){
            header("Location: ".URLROOT."/Cart/");
        } else {
            $data ['loginModel'] = $this->loginModel;
            $data ['user'] = $this->loginModel->getUser($_SESSION['user_username']);
            if(isset($_POST['checkout'])){
                $data['cardnum'] = $_POST['cardnum'];
                $data['card_expiration'] = $_POST['card_expiration'];
                $data['card_securitynum'] = $_POST['card_securitynum'];
                $data['cardname'] = $_POST['cardname'];
            
                if($this->validateCreditCard($data)) {
                    $this->loginModel->editCreditCard($data);
                    unset($_SESSION['cart_products']);
                    header("Location: ".URLROOT."/Product/");
                }
            }
        }
        
        $this->view('Cart/payment', $data);
    }
    private function validateCreditCard($data){
        
        if(strlen(trim($data['cardnum'])) != 16){
            $data['cardnum_len_error'] = 'Credit not valid';
        }

        $pattern = "/\b(\d){2}\/(\d){4}\b/i";

        if($data['card_expiration'] != $data['card_expiration'] && !preg_match($pattern, $data['card_expiration'])){
            $data['card_expiration_error'] = 'The expiration date is not formated properly';
        }

        if(strlen($data['card_securitynum']) != 3){
            $data['card_securitynum_error'] = 'The security code is not valid ';
        }

        if(empty($data['cardname'])){
            $data['cardname_error'] = 'Card Name can not be empty';
        }

        if(empty($data['cardnum_len_error']) && empty($data['card_expiration_error'])
         && empty($data['card_securitynum_error']) && empty($data['cardname_error'])){
            return true;
        } else {
            $this->view('Cart/payment',$data);
        }
    }
    
}
?>