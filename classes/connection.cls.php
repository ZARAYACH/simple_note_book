<?php

  class connection{
    
        public static function connectToDb(){
            try  {
                $conn = new PDO('mysql:host=localhost;dbname=simple_note_book;charset=utf8', 'root', '');
     $conn->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION);
                return $conn;
                }
            catch (Exception $e)
                {
     echo('Erreur : ' . $e->getMessage());
                }
        }
        public static function actionOnDB($sql){
            $result = false;
            $conn = self::connectToDb();
            if($conn->exec($sql) !== false){
                $result = true;
            }
            $conn = null ;
            return $result;
        }

        public static function selectionFromDb($sql){
            $conn = self::connectToDb();
            $cur = $conn->query($sql);
            if( $cur !== false){
                return $cur;
            }
            return false;
            $conn = null ;
            
        }


  }