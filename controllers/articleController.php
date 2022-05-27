<?php
    class ArticleController{


        public function __construct(){

        }

        public function show( $id ){
            try {
                global $currentUser;

                // Pedimos datos al modelo
                $article = Article::getById( $id );
                $comments = $article->getComments();
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
                global $currentUser;
                // pedir artículo
                $article = Article::getById( $id );
                // cargar vista de artículo
                require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/post/edit.php");

            } catch (\Throwable $th) {

               print_r( $th );
            }
        }

        public function edit( $id ){
            try {
                global $currentUser;
                // actualizar artículo
                
                $article_id = Article::update( $id );

                // redirigir al usuario; home? article/3?
                header("Location: ".FOLDER."/article/$article_id");

            } catch (\Throwable $th) {

               print_r( $th );
            }
        }

        public function delete( $id ){
            try {
                global $currentUser;
                //Borrar artículo
                
                $article_id = Article::delete( $id );

                echo "borrado";
               // header("Location: ".FOLDER."/article/$article_id");

            } catch (\Throwable $th) {

               print_r( $th );
            }
        }

        public function search(){
            // buscar artículos y devolverlos con print_r
            try {
                // $data = Article::list(); // data -> ARRAY [Objetos]

                $data = Article::search();

                $response = json_encode($data);
                print_r($response);

            } catch (\Throwable $th) {
                //throw $th;
            }


        }

    }

?>