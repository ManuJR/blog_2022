<?php

    class WebController
    {
        
        public function __construct( )
        {   
            
        }

        public function index(){
          global $currentUser;
          require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/web/home.php");

        }

        public function services(){

          require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/web/services.php");

        }

        public function signup(){
          global $currentUser; 
          if( $currentUser ){
            header("Location: ".FOLDER."/");
          }
          require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/user/signup.php");

        }

        public function login(){
          global $currentUser; 
          if( $currentUser ){
            header("Location: ".FOLDER."/");
          }

          require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/user/login.php");

        }

    }

?>