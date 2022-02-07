<?php
    class Controller{
        /*
            This is our base controller 
            It will have two functions - one to invoke views and one to invoke models 
        */

        public function view($name, $data = []){
            if(file_exists('../app/views/'.$name.'.php')){
                require_once('../app/views/'.$name.'.php');
            }
            else{
                echo '../app/views/'.$name.'.php does not exists';
            }
        }


    }
?>