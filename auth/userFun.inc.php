<?php

require_once "../classes/note.cls.php";

if(isset($_POST["what"])){
    if($_POST["what"]=="true"){
        $noteID = $_POST["id"];
    $return = note::addToFavorites($noteID);
    if($return){
        return "im working";
    }
    }
    
}