<?php

class Login extends Controller
{
    
    public function __construct()
    {
         $this->adminUsername = "sussyKeychainMaster69";
         $this->adminPassword = "Armenjabo4";
        $this->loginModel = $this->model('loginModel');
        
    }

    public function index()
    {
        if(!isset($_POST['login'])){
            
            $this->view('Login/index');
        }
        else{
            $username = $_POST['username'];
            $password = $_POST['password'];
            if($password == $this->adminPassword &&  $username == $this->adminUsername)
            {
                $_SESSION['admin'] = "in";
                header("Location: ".URLROOT."/Admin/index");
            }else{

            
            $user = $this->loginModel->getUser($username);
            
            if($user != null){
                $hashed_pass = $user->pass_hash;
                
                $secret = $user->secret;
                $code = $_POST['code'];
                
                if(password_verify($password,$hashed_pass)){
                    //echo '<meta http-equiv="Refresh" content="2; url=/MVC/">';
                    
                    if($user->secret != null){
                        if(!empty($code)) {
                            if(check($secret, $code)){
                                $this->createSession($user);
                                $data = [
                                    'msg' => "Welcome, $user->username!",
                                ];
                                $this->view('Product/home',$data);
                            }
                            else{
                                $data = [
                                    'msg' => "2FA Code incorect/expired for $user->username",
                                ];
                                
                                $this->view('Login/index',$data); 
                            }
                        }
                        else{
                            $data = [
                                'msg' => "Please enter the 2FA code for $user->username",
                            ];
                            echo "<script>alert('didn't work);</script>";
                            $this->view('Login/index',$data); 
                        }
                        
                    }
                    else{
                        $this->createSession($user);
                            $data = [
                                'msg' => "Welcome, $user->username!",
                            ];
                            $this->view('Product/home',$data);
                    }
                }
                else{
                    $data = [
                        'msg' => "Password incorrect! for $user->username",
                    ];
                    $this->view('Login/index',$data);
                }
            }
            else{
                $data = [
                    'msg' => "User: ". $_POST['username'] ." does not exists",
                ];
                $this->view('Login/index',$data);
            }
            }
        }
    }

    public function create()
    {
        if(!isset($_POST['register'])){
            $this->view('Login/create');
        }
        else{
            $user = $this->loginModel->getUser($_POST['username']);
            if($user == null){
                $data = [
                    'username' => trim($_POST['username']),
                    'pass' => $_POST['password'],
                    'pass_verify' => $_POST['verify_password'],
                    'pass_hash' => password_hash($_POST['password'], PASSWORD_DEFAULT),
                    'username_error' => '',
                    'password_error' => '',
                    'password_match_error' => '',
                    'password_len_error' => '',
                    'msg' => '',
                ];
                if($this->validateData($data)){
                    if($this->loginModel->createUser($data)){
                        echo '
                        <div class="text-center">
                        <div class="spinner-border" role="status">
                          <span class="sr-only">Please wait creating the account for '.trim($_POST["username"]).'</span>
                        </div>
                      </div>';
                        echo '<meta http-equiv="Refresh" content="2; url=/ECommerceProject2022/Login/">';
                 }
                } 
            }
            else{
                $data = [
                    'msg' => "User: ". $_POST['username'] ." already exists",
                ];
                $this->view('Login/create',$data);
            }
        }
    }

    public function validateData($data){
        if(empty($data['username'])){
            $data['username_error'] = 'Username can not be empty';
        }
        if(strlen($data['pass']) < 6){
            $data['password_len_error'] = 'Password can not be less than 6 characters';
        }
        if($data['pass'] != $data['pass_verify']){
            $data['password_match_error'] = 'Password does not match';
        }

        if(empty($data['username_error']) && empty($data['password_error']) && empty($data['password_len_error']) && empty($data['password_match_error'])){
            return true;
        }
        else{
            $this->view('Login/create',$data);
        }
    }

    public function createSession($user){
        $_SESSION['user_id'] = $user->id;
        $_SESSION['user_username'] = $user->username;
    }

    public function logout(){
        unset($_SESSION['user_id']);
        session_destroy();
        echo '<meta http-equiv="Refresh" content="1; url=/Product/Login/">';
    }
}
