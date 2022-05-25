<?php

    class WebController
    {
        
        public function __construct( )
        {   
            
        }

        public function index( $page = 1 ){
          global $currentUser;
          // pedir últimos artículos
          $articles_result = Article::list( $page );
          $articles = $articles_result['data'];
          require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/web/home.php");

        }

        public function news( $page = 1 ){
          global $currentUser;
          // pedir últimos artículos
          $articles_result = Article::list( $page );
          $articles = $articles_result['data'];
          $total_articles = $articles_result['count'];
          $max_page = $articles_result['max_page'];

          require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/web/news.php");

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