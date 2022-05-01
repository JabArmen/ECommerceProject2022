<?php

class UserInfo extends Controller
{
    
    public function __construct()
    {
        if(!isset($_SESSION['user_id'])){
            header("Location: ".URLROOT."/Product/index");
        }
        $this->loginModel = $this->model('loginModel'); 
    }

    public function index()
    {
        if(!isset($_POST['confirm'])){
            
            $this->view('UserInfo/index');
        }
        else{
            $username =  $_SESSION['user_username'];
            $password = $_POST['password'];
            $code = $_POST['code'];
            
            $user = $this->loginModel->getUser($username);
            
            if($user != null){
                $hashed_pass = $user->pass_hash;
                
                $secret = $user->secret;
                
                
                if(password_verify($password,$hashed_pass)){
                    
                    if($user->secret != null){
                        if(!empty($code)) {
                            if(check($secret, $code)){
                                $_SESSION['validated'] = "true";
                                header("Location: ".URLROOT.'/UserInfo/editInfo');
                            }
                            else{
                                $data = [
                                    'msg' => "2FA Code incorect/expired for $user->username",
                                ];
                                
                                $this->view('UserInfo/editInfo',$data); 
                            }
                        }
                        else{
                            $data = [
                                'msg' => "Please enter the 2FA code for $user->username",
                            ];
                            echo "<script>alert('didn't work);</script>";
                            $this->view('UserInfo/index',$data); 
                        }
                        
                    }
                    else{
                    }
                }
                else{
                    $data = [
                        'msg' => "Password incorrect! for $user->username",
                    ];
                    $this->view('UserInfo/index',$data);
                }
            }
            else{
                $data = [
                    'msg' => "User: ". $username ." does not exists",
                ];
                $this->view('UserInfo/index',$data);
            }
            
        }
    }

    public function editInfo()
    {
        if(!isset($_SESSION['validated'])){
            $this->view('Product/index');
        } else {
            if(!isset($_POST['edit'])){
            $this->view('UserInfo/editInfo');
            }
            else{
                $data = [
                    'address' => trim($_POST['address']),
                    'cardnum' => trim($_POST['cardnum']),
                    'cardname' => trim($_POST['cardname']),
                    'card_expiration' => trim($_POST['card_expiration']),
                    'card_securitynum' => trim($_POST['card_securitynum']),
                    'address_error' => '',
                    'cardnum_len_error' => '',
                    'card_expiration_error' => '',
                    'card_securitynum_error' => '',
                    'cardname_error' => '',
                ];
                if($this->validateData($data)){
                    if($this->loginModel->editUser($data)){
                        unset($_SESSION['validated']);
                        echo '
                        <div class="text-center">
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Please wait creating the account for '.trim($_SESSION['user_username']).'</span>
                        </div>
                      </div>';
                        echo '<meta http-equiv="Refresh" content="2; url=/ECommerceProject2022/Product/">';
                 }
                
                }
            }
        }
    }

    public function delete($user_id){
        $data=[
            'id' => $user_id
        ];
        if($this->loginModel->delete($data)){
            unsetAll();
            header("Location: ".URLROOT."/Product/index");
        }

    }

    public function validateData($data){
        if(empty($data['address'])){
            $data['address_error'] = 'Address can not be empty';
        }
        echo strlen(trim($data['cardnum']));
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

        if(empty($data['address_error']) && empty($data['cardnum_len_error']) && empty($data['card_expiration_error'])
         && empty($data['card_securitynum_error']) && empty($data['cardname_error'])){
            return true;
        } else {
            $this->view('UserInfo/editInfo',$data);
        }
    }

}