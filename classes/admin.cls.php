<?php 

require_once "../classes/connection.cls.php";
require_once "../classes/user.cls.php";
require_once "../classes/note.cls.php";

class admin extends user{


    public function setAdminLevel($adminLevel)
    {
        $this->adminLevel=$adminLevel;    
    }
    public function getAdminLevel()
    {
        return $this->adminLevel;
    }
    public function __construct($id,$username,$firstname,$lastname,$email,$password,$admin) {
        parent::__construct($id,$username,$firstname,$lastname,$email,$password,$admin);
    }

    


}