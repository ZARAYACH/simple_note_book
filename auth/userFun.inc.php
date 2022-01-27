<?php

require_once "../classes/note.cls.php";
require_once "../classes/user.cls.php";

session_start();
if(isset($_POST["what"])){
    if($_POST["what"] == "fav"){
        $noteID = $_POST["noteId"];
      echo addToFav($noteID);
    }
}
    if(isset($_POST["what"])){
        if($_POST["what"] == "unfav"){
            $noteID = $_POST["noteId"];
          $return = note::removeFromFavorites($noteID);
          echo $return;
        }
      
    }

    if(isset($_POST["what"])){
        if($_POST["what"] == "arch"){
            $noteID = $_POST["noteId"];
          $return = note::addToArchive($noteID);
          echo $return;
        }
      
    }
    if(isset($_POST["what"])){
        if($_POST["what"] == "unarch"){
            $noteID = $_POST["noteId"];
          $return = note::removeFromArchive($noteID);
          echo $return;
        }
      
    }
    if(isset($_POST["what"])){
        if($_POST["what"] == "search"){
            $userID = $_POST["userId"];
            $title = $_POST["title"];
          $return = note::searchNote($userID,$title);
          if($return){
            if($return->rowCount()>0){
              while($row=$return->fetch()){
                note::dispalayNote($row[1],$row[2],$row[0],$row[5],$row[6]);
              }
            }else{
              echo "<h2>note you're searching does not exists</h2>";
            }
            
        }
        }
      
    }


    


if(isset($_POST["what"])){
    if($_POST["what"] == "display"){
        $userID = $_POST["userId"];
        $return = note::allNotes($userID);
        if($return)
        {
            while($row=$return->fetch()){
            note::dispalayNote($row[1],$row[2],$row[0],$row[5],$row[6]); 
            }
           
   }
    }
}

if(isset($_POST["what"])){
  if($_POST["what"]=="update"){
    $noteID = $_POST["noteId"];
    $userID = $_POST["userId"];
    $noteTitle = $_POST["titleNote"];
    $bodyNote = $_POST["bodyNote"];
    $return = note::editNote($noteID,$noteTitle,$bodyNote);
      if($return){
        $return2 = note::allNotes($userID);
        if($return2)
        {
            while($row=$return2->fetch()){
            note::dispalayNote($row[1],$row[2],$row[0],$row[5],$row[6]); 
            }
           
   }


      }
  }else if($_POST['what']=="allFav"){
    $userID = $_POST["userId"];
    $return=note::allFav($userID);
    if($return->rowCount()>0){
      while($row=$return->fetch()){
        note::dispalayNote($row[1],$row[2],$row[0],$row[5],$row[6]); 
        }
    }else{
      echo "there is no favorites ones";
    }

  }else if($_POST['what']=="allArchived"){
    $userID = $_POST["userId"];
    $return=note::allArchived($userID);
    if($return->rowCount()>0){
      while($row=$return->fetch()){
        note::dispalayNote($row[1],$row[2],$row[0],$row[5],$row[6]); 
        }
    }else{
      echo "the archive is empty";
    }

  }else if($_POST['what']=="allNotes"){
    $userID = $_POST["userId"];
    $return=note::allNotes($userID);
    if($return->rowCount()>0){
      while($row=$return->fetch()){
        note::dispalayNote($row[1],$row[2],$row[0],$row[5],$row[6]); 
        }
    }

  }else if($_POST["what"]=="settings"){
   if(isset($_SESSION["user"])){
    $user = unserialize($_SESSION["user"]);
    $userId = $user->getId();
    $userName = $user->getUsername();
    $firstName = $user->getFirstName();
    $lastName = $user->getLastName();
    $email = $user->getEmail();
    $admin = $user->getAdmin();
    user::displaySettings($userName,$firstName,$lastName,$email,$admin);
   }
}else if($_POST["what"]=="updateUserInfo"){
   if(isset($_SESSION["user"])){
     $user = unserialize($_SESSION["user"]);
     $userID = $user->getId();
    $userName= $_POST["userName"];
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $return = $user->changeInfo($userName,$firstName,$lastName,$email,$userID);
    if(isset($_FILES["file"])){
      $name =$userName."|".$_FILES['file']['name'];
      $temp = $_FILES['file']["tmp_name"];
      $destination = "../usersimg/".$name;
      $moved = move_uploaded_file($temp,$destination);
      if($moved){
        $added = $user->addUserImg($userID,$destination);
      }
    }
    if($return){
      $return2 = $user->getAllInfoDb($userId);
      while($row=$return2->fetch()){
      user::displaySettings($row[1],$row[2],$row[3],$row[4],$row[6]);

      }
      
    }
  
  }
   }
}


function addToFav($noteID){
    $return = note::addToFavorites($noteID);
    return $return;
}





