<?php

require_once 'connection.cls.php';

class user{
    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $admin;
    
    public function setUserName($username){
        $this->username = $username;
     }
     public function getUserName(){
        return $this->username;
     }

     public function setFirstName($firstname){
        $this->firstname = $firstname;
     }
     public function getFirstName(){
        return $this->firstname;
     }

     public function setLastName($lastname){
        $this->lastname = $lastname;
     }
     public function getLastName(){
        return $this->lastname;
     }
     public function setEmail($email){
        $this->email = $email;
     }
     public function getEmail(){
        return $this->email;
     }
     public function setPwd($password){
         $hashedPwd = password_hash( $password , PASSWORD_DEFAULT);
        $this->password = $hashedPwd;
     }
     public function getPwd(){
        return $this->password;
     }
     public function setadmin($admin){
        $this->admin = $admin;
     }
     public function getadmin(){
        return $this->admin;
     }

     public function __construct($id,$username,$firstname,$lastname,$email,$password,$admin)
     {
         $this->id = $id;
         $this->username = $username;
         $this->firstname = $firstname;
         $this->lastname = $lastname;
         $this->email = $email;
         $this->setPwd($password);
         $this->admin = $admin;
     }
     public function addToDb($username,$firstname,$lastname,$email,$password,$admin){
         $sql= "insert into users(username,first_name,last_name,email,pwd,admin) values ('$username','$firstname','$lastname','$email','$password','$admin')";
         $return = connection::actionOnDB($sql);
            return $return;
     }
     public function changeInfo($username,$firstname,$lastname,$email,$password,$admin){
        $sql= "update users set first_name='$firstname' last_name='$lastname' email='$email' pwd='$password' admin='$admin' where username='$username' ";
        $return = connection::actionOnDB($sql);
           return $return;
    }
    public function deleteAcount($username){
        $sql= "delete from users where username ='$username'";
        $return = connection::actionOnDB($sql);
           return $return;
    }

}