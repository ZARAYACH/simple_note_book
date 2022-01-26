<?php

require_once 'connection.cls.php';

class user{
    private $id;
    private $username;
    private $firstname;
    private $lastname;
    private $email;
    private $password;
    private $admin;
    
    public function setId($id){
      $this->id = $id;
   }
   public function getId(){
      return $this->id;
   }


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
    public static function displaySettings($userName,$firstName,$lastName,$email,$admin){
      echo("
    <div class='settings'>
    <div class='header_settings'>Settings</div>
    <div class='info'>
      <div class='label' > Username : </div>
      <div class='user_info'><input disabled id='username' value='$userName'></input></div>
      <div class='label'>First name :</div>
      <div class='user_info'><input disabled id='firstName' value='$firstName'></input></div>
      <div class='label'>Last name :</div>
      <div class='user_info'><input disabled id='lastName' value='$lastName' ></input></div>
      <div class='label'>Email :</div>
      <div class='user_info'><input disabled id='email' value='$email' ></input></div>
       <form action='../auth/savephoto.inc.php' method='POST' enctype='multipart/form-data' >
          <div class='wrapp'>
          <div class='label'>choose your profile image</div>
         <div class = 'user_info'><label class='lll' for='photo'>CHOOSE</label> <input type='file' name='photo' id='photo'></div>
          </div>
          <input type='submit' name='save' value='save'>
      </form>
    </div>
  </div>
  <script> let button = document.querySelector('.toAdd');
  button.classList.add('ff');</script>
            ");
    }
    

}