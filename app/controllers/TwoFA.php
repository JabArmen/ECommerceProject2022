<?php
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

class TwoFA extends Controller
{

    public function __construct()
    {
        $this->loginModel = $this->model('loginModel');
    }

    function generateQRCode(){
        $g = new \Google\Authenticator\GoogleAuthenticator();
        $secret = $g->generateSecret();
        $data = [
            'secret' => $secret
        ];
        $this->loginModel->updateUser($data);
        //the "getUrl" method takes as a parameter: "username", "host" and the key "secret"
        return '<img src="'.$g->getURL($_SESSION['user_username'], 'localhost', $secret).'" class="rounded mx-auto d-block"/>';
    }

    function generateQRCodewithSecret($secret){
        $g = new \Google\Authenticator\GoogleAuthenticator();
        $data = [
            'secret' => $secret
        ];
        //the "getUrl" method takes as a parameter: "username", "host" and the key "secret"
        return '<img src="'.$g->getURL($_SESSION['user_username'], 'localhost', $secret).'" class="rounded mx-auto d-block"/>';
    }

    function check($secret, $code){
        $g = new \Sonata\GoogleAuthenticator\GoogleAuthenticator();
        if($g->checkCode($secret, $code)){
            return true;
        }
        else{
            return false;
        }
    }
  

    public function SetupAdmin()
    {
        if(isset($_SESSION['admin'])) {
            $g = new \Google\Authenticator\GoogleAuthenticator();
        
            //the "getUrl" method takes as a parameter: "username", "host" and the key "secret"
        
            $qrcode = '<img src="'.$g->getURL('Admin', 'localhost', "YLSGGL35JZAEZLVV").'" class="rounded mx-auto d-block"/>';
                $data = [
                    'qrcode' =>  $qrcode
                ];
                $this->view('TwoFA/setup', $data);
        }else{
            echo 'Access Denied';
        }
        
    }

    public function Setup()
    {
        $user = $this->loginModel->getUser($_SESSION['user_username']);
        if($user->secret == null){
            $qrcode = $this->generateQRCode();
            $data = [
                'qrcode' =>  $qrcode
            ];
            $this->view('TwoFA/setup', $data);
        }
        else{
            $qrcode = $this->generateQRCodewithSecret($user->secret);
            $data = [
                'qrcode' =>  $qrcode
            ];
            $this->view('TwoFA/setup', $data);
        }
        
    }
}
