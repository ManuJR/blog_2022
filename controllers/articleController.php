<?php
    class ArticleController{


        public function __construct(){

        }

        public function show( $id ){
            try {
                global $currentUser;

                // Pedimos datos al modelo
                $article = Article::getById( $id );
                // Cargamos vista
                require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/post/show.php");
               
            } catch (\Throwable $th) {
                print_r($th);
                $error = $th;
                require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/404.php");
            }
        }
    }

?>