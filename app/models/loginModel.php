<?php

    class loginModel{
        public function __construct(){
            $this->db = new Model;
        }
    

        public function getUsers(){
            $this->db->query("SELECT * FROM credentials");
            return $this->db->getResultSet();
        }

        public function getUser($username){
            $this->db->query("SELECT * FROM credentials WHERE username = :username");
            $this->db->bind(':username',$username);
            return $this->db->getSingle();
        }

        public function createUser($data){
            $this->db->query("INSERT INTO credentials (username, pass_hash) values (:username, :pass_hash)");
            $this->db->bind(':username', $data['username']);
            $this->db->bind(':pass_hash', $data['pass_hash']);


            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
        public function deleteUser($username){
            $this->db->query("DELETE FROM credentials WHERE username = :username;");
            $this->db->bind(':username', $username);
            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }
        }
        public function updateUser($data){
            $this->db->query("UPDATE credentials SET secret = :secret WHERE id = :userid");
            $this->db->bind(':userid', $_SESSION['user_id']);
            $this->db->bind(':secret', $data['secret']);


            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }

        public function editUser($data){
            $this->db->query("UPDATE credentials SET address = :address, cardnum = :cardnum, 
            card_expiration = :card_expiration, card_securitynum = :card_securitynum, cardname = :cardname WHERE id = :userid");
            $this->db->bind(':userid', $_SESSION['user_id']);
            $this->db->bind(':address', $data['address']);
            $this->db->bind(':cardnum', $data['cardnum']);
            $this->db->bind(':card_expiration', $data['card_expiration']);
            $this->db->bind(':card_securitynum', $data['card_securitynum']);
            $this->db->bind(':cardname', $data['cardname']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            
            }
        }

        public function delete($data){
            $this->db->query("DELETE FROM credentials WHERE id=:id");
            $this->db->bind('id',$data['id']);

            if($this->db->execute()){
                return true;
            }
            else{
                return false;
            }

        }
    }
?>