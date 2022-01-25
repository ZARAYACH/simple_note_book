<?php

require_once "../classes/note.cls.php";

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

function addToFav($noteID){
    $return = note::addToFavorites($noteID);
    return $return;
}



