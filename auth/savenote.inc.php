<?php
session_start();

require_once '../classes/user.cls.php';
require_once '../classes/connection.cls.php';
require_once '../classes/note.cls.php';

if(!empty($_POST["titre"]) and !empty($_POST['note'])){
  $user = unserialize($_SESSION['user']);
  $userId = $user->getId();
  $username = $user->getUsername();
  $noteTitre=filter_var($_POST["titre"], FILTER_SANITIZE_STRING);
  $noteBody =filter_var($_POST["note"], FILTER_SANITIZE_STRING); 
  $id=null;
  $note = new note($id,$userId,$noteTitre,$noteBody);
  $return = $note->addNote($note->getUserId(),$note->getNoteTitle(),$note->getNoteBody());
  if(!$return){
    header ("location:..\pages\user-home.php?saved=False");
    exit();
  }else{
    header ("location:..\pages\user-home.php?saved=True");
    exit();
  }
    }
    else
    {
      header ("location:..\pages\user-home.php?saved=imptyinput");
          exit();
  
    }
    