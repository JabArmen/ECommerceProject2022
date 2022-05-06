<?php
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/FixedBitNotation.php';
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticatorInterface.php';
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleAuthenticator.php';
include_once dirname(APPROOT).'/vendor/sonata-project/google-authenticator/src/GoogleQrUrl.php';

    session_start();

    function isLoggedIn(){
        if(isset($_SESSION['user_id'])){
          return true;
        } else {
          return false;
        }
      }
      function unsetAll(){
        unset($_SESSION['user_id']);
            unset($_SESSION['user_username']);
            unset($_SESSION['cart_products']);
            if(isset($_SESSION['validated'])){
                unset($_SESSION['validated']);
            }
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
      
    
    function imageUpload(){
      //default value for the picture
      $filename=false;
      
      //save the file that gets sent as a picture
      $file = $_FILES['picture'];
      
      $acceptedTypes = ['image/jpeg'=>'jpg',
          'image/gif'=>'gif',
          'image/png'=>'png'];
      //validate the file
      
      if(empty($file['tmp_name']))
          return false;

      $fileData = getimagesize($file['tmp_name']);

      if($fileData!=false && 
          in_array($fileData['mime'],array_keys($acceptedTypes))){

          //save the file to its permanent location
              
          $folder = dirname(APPROOT).'/public/img';
          $filename = uniqid() . '.' . $acceptedTypes[$fileData['mime']];
          move_uploaded_file($file['tmp_name'], "$folder/$filename");
      }
      return $filename;
  }
  
?>