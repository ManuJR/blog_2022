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

        public function new(){
            global $currentUser;
            try {
                // vista de creación de artículo
                require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/post/new.php");
            } catch (\Throwable $th) {
                //throw $th;
            }
        }   

        public function create(){
            try {
                $article_id = Article::create();
                // redirigir a vista de artículo
                header("Location:".FOLDER."/article/$article_id");

            } catch (\Throwable $th) {

               print_r( $th );
            }
        }

        public function edit_view( $id ){
            try {
                // pedir artículo
                $article = Article::getById( $id );
                print_r($article);
                // cargar vista de artículo
            } catch (\Throwable $th) {

               print_r( $th );
            }
        }
    }

?>