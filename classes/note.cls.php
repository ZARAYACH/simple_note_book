<?php 
require_once '../classes/connection.cls.php';
require_once '../classes/user.cls.php';
class note{

    private $id;
    private $noteTitle;
    private $noteBody;
    private $userID;
    private $archived;
    private $favorite;

    public function getNoteID()
    {
        return $this->id;
    }
    public function setNoteID($id)
    {
        $this->id = $id;
    }

    public function getNoteTitle()
    {
        return $this->noteTitle;
    }
    public function setNoteTitle($noteTitle)
    {
        $this->noteTitle = $noteTitle;
    }

    public function getNoteBody()
    {
        return $this->noteBody;
    }
    public function setNoteBody($noteBody)
    {
        $this->noteBody = $noteBody;
    }

    public function getUserId()
    {
        return $this->userID;
    }
    public function setUserId($userID)
    {
        $this->userID = $userID;
    }

    public function __construct($id,$userID,$noteTitle,$noteBody)
    {
        $this->userID=$userID;   
        $this->noteTitle= $noteTitle;
        $this->noteBody = $noteBody;
        $this->id = $id;
    }

    public function getArchived()
    {
        return $this->archived;
    }
    public function setArchived($archived)
    {
        $this->archived = $archived;
    }

    public function getFavorite()
    {
        return $this->favorite;
    }
    public function setFavorites($favorite)
    {
        $this->favorite = $favorite;
    }

    public function addNote($userID,$noteTitle,$noteBody)
    {
        $result = false;
        $sql = "insert into notes(note_titre,note_body,user_id) values ('$noteTitle','$noteBody','$userID')";
        $return = connection::actionOnDB($sql);
        if($return){
            $result = true;
        }
        return $result;
    }
    public static function deleteNote($id)
    {
        $result = false;
        $sql = "delete from notes where note_id = '$id' ";
        $return = connection::actionOnDB($sql);
        if($return){
            $result = true;
        }
        return $result;
    }
    public function editNote($id,$noteTitle,$noteBody)
    {
        $result = false;
        $sql = "update notes set note_titre = '$noteTitle' note_body = '$noteBody' where note_id = $id"; 
        $return = connection::actionOnDB($sql);
        if($return){
            $result = true;
        }
        return $result;
    }

    public static function addToFavorites($id)
    {
        $result = false;
        $sql = "update notes set favorite = true where note_id = $id"; 
        $return = connection::actionOnDB($sql);
        if($return){
            $result = true;
        }
        return $result;
        
    }
    public static function removeFromFavorites($id)
    {
        $result = false;
        $sql = "update notes set favorite = false where note_id = $id"; 
        $return = connection::actionOnDB($sql);
        if($return){
            $result = true;
        }
        return $result;
        
    }

    public static function addToArchive($id)
    {
        $result = false;
        $sql = "update notes set archived = true where note_id = $id"; 
        $return = connection::actionOnDB($sql);
        if($return){
            $result = true;
        }
        return $result;
        
    }    
    public static function removeFromArchive($noteid)
    {
        $result = false;
        $sql = "update notes set archived = false where note_id = $noteid"; 
        $return = connection::actionOnDB($sql);
        if($return){
            $result = true;
        }
        return $result;
        
    }

    public static function allNotes($userID)
    {
        $result = false; 
        $sql = "select * from notes where user_id = '$userID'";
        $return = connection::selectionFromDb($sql);
        if($return){
            $result = $return;
        }
        return $result;
    }

    public static function searchNote($userID,$noteTitle)
    {
        $result = false; 
        $sql = "select * from notes where user_id = '$userID' and note_titre = '$noteTitle' ";
        $return = connection::selectionFromDb($sql);
        if($return){
            $result = $return;
        }
        return $result;
    }
    public static function dispalayNote($noteTitre,$noteBody,$noteID,$archived,$favorite)
    {
        if($favorite ==true && $archived ==false ){
            echo("<div class='note'>
            <div noteID='$noteID' class='note_header'>
                <a id='fav'  class='favorite_button'><img favorite='true' src='../assets/favorite_black_24dp.svg'></img> </a>
                <a id='edit' class='edit_button'><img src='../assets/edit_black_24dp.svg'></img> </a>
                <a id='arch' class='archive_button'> <img archieved='false' src='../assets/archive_black_24dp.svg'></img></a>
                <a id='del' class='delete_button'><svg xmlns='http://www.w3.org/2000/svg'  height='24px' viewBox='0 0 24 24' width='24px' ><path d='M0 0h24v24H0V0z' fill='none'/><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z'/></svg> </a>
                </div>
                <div class='title_note'>$noteTitre</div>   
            <div class='main_note'>$noteBody</div>
            </div>");
        }else if($archived == true && $favorite == false){
            echo("<div class='note'>
            <div noteID='$noteID' class='note_header'>
                <a id='fav'  class='favorite_button'><img favorite='false' src='../assets/favorite_border_black_24dp.svg'></img> </a>
                <a id='edit' class='edit_button'><img src='../assets/edit_black_24dp.svg'></img> </a>
                <a id='arch' class='archive_button'> <img archieved='true' src='../assets/unarchive_black_24dp.svg'></img></a>
                <a id='del' class='delete_button'><svg xmlns='http://www.w3.org/2000/svg'  height='24px' viewBox='0 0 24 24' width='24px' ><path d='M0 0h24v24H0V0z' fill='none'/><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z'/></svg> </a>
                </div>
            <div class='title_note'>$noteTitre</div>   
            <div class='main_note'>$noteBody</div>
            </div>");
            
        }else if($archived == true && $favorite == true){
            echo("<div class='note'>
            <div noteID='$noteID' class='note_header'>
                <a id='fav'  class='favorite_button'><img favorite='true' src='../assets/favorite_black_24dp.svg'></img> </a>
                <a id='edit' class='edit_button'><img  src='../assets/edit_black_24dp.svg'></img> </a>
                <a id='arch' class='archive_button'> <img archieved='true' src='../assets/unarchive_black_24dp.svg'></img></a>
                <a id='del' class='delete_button'><svg xmlns='http://www.w3.org/2000/svg'  height='24px' viewBox='0 0 24 24' width='24px' ><path d='M0 0h24v24H0V0z' fill='none'/><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z'/></svg> </a>
                </div>
            <div class='title_note'>$noteTitre</div>   
            <div class='main_note'>$noteBody</div>
            </div>");
        }else{
            echo("<div class='note'>
            <div noteID='$noteID' class='note_header'>
                <a id='fav'  class='favorite_button'><img favorite='false' src='../assets/favorite_border_black_24dp.svg'></img> </a>
                <a id='edit' class='edit_button'><img src='../assets/edit_black_24dp.svg'></img> </a>
                <a id='arch' class='archive_button'> <img archieved='false' src='../assets/archive_black_24dp.svg'></img></a>
                <a id='del' class='delete_button'><svg xmlns='http://www.w3.org/2000/svg'  height='24px' viewBox='0 0 24 24' width='24px' ><path d='M0 0h24v24H0V0z' fill='none'/><path d='M6 19c0 1.1.9 2 2 2h8c1.1 0 2-.9 2-2V7H6v12zM8 9h8v10H8V9zm7.5-5l-1-1h-5l-1 1H5v2h14V4z'/></svg> </a>
                </div>
                <div class='title_note'>$noteTitre</div>
            <div class='main_note'>$noteBody</div>
            </div>");
        }


        







      
    }
}