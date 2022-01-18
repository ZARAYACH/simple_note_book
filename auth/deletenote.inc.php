<?php

require_once '../classes/note.cls.php';

if(isset($_POST['delete'])){

    $id = $_POST['noteId'] ;
    $return = note::deleteNote($id);
    if(!$return){
        header ("location:..\pages\user-home.php?error=deleteWithFailure");
    exit();
    }else{
        header ("location:..\pages\user-home.php?error=deleteWithSuccess");
        exit();
    }

}