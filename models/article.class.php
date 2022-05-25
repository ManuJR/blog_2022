<?php

    class Article{

        private $id;
        private $title;
        private $description;
        private $image;
        private $user_id;
        private $created_at;
        const NUM_ITEMS = 3;

        public function __construct( $params ){
            foreach ($params as $key => $value) {
                $this->$key = $value;
            }
        }

        public function __get($prop){
            return $this->$prop;
        }

        public static function getById( $id ){
            
            // conexión
            global $connection;
            // query 
            $query = "SELECT * FROM article WHERE id = $id ";
            // exec query
            $exec_q = $connection->query( $query );

            // errores BBDD?
            if( $connection->error ){
                throw new Exception( "Error al obtener artículo: ". $connection->error );
            }
            if( $exec_q->num_rows !=1 ){
                throw new Exception( "No se encuentra el artículo" );
            }
            // recoger datos
            $article_bbdd = $exec_q->fetch_assoc();
            // Devolver Article Object()
            $article = new Article($article_bbdd);
            return $article;

        }

        public function shortDescription(){
            return substr( $this->description, 0, 100 )."...";
        }
        
        public function getImage(){
            return $this->image ? $this->image : FOLDER."/assets/imgs/blog_default.png";
        }

        public static function create(){
            // validación de campos
            self::validateFields($_POST);

            // imagen correcta --> Guardamos el articulo con su IMG

            // conexión
            global $connection;

            extract($_POST);
            $img = "playa.jpg"; // $_FILES['img']['name']

            global $currentUser;
            $user_id = $currentUser->id;

            // query 
            $query = "INSERT INTO article(`title`, `description`, `user_id`) VALUES ('$title', '$description', '$user_id')";
           
            // ejecutar query
            $ex_q = $connection->query($query);

            // errores
            if( $connection->error ){
                throw new Exception( "Error al crear artículo: ". $connection->error );
            }
            // recoger id 
            $article_id = $connection->insert_id;

            //self::saveFile();

            // devolver id
            return $article_id;

        }

        public static function list( $page = 1 ){
    
            // conexión
            global $connection;
            // query
            $offset = ($page - 1) * self::NUM_ITEMS;
            $query = "SELECT * FROM article WHERE 1 ORDER BY created_at DESC LIMIT ".self::NUM_ITEMS." OFFSET $offset";
            // ejecutar query
            $ex_q = $connection->query($query);

            $total_articles = self::count();
            $total_pages = ceil($total_articles/self::NUM_ITEMS);

            // error?
            if( $connection->error ){
                throw new Exception( "Error al listar artículos: ". $connection->error );
            }
            // recoger datos en array
            $articles_bbdd = $ex_q->fetch_all(MYSQLI_ASSOC);

            $articles = [];
            // transformar array en array de Article()
            foreach ($articles_bbdd as $article) {
                array_push($articles, new Article( $article ));
            }
            // devolver datos
            $result = [
                "data" => $articles,
                "count" => $total_articles,
                "max_page" => $total_pages
            ];
            
            return $result;
        }

        public static function count(){
            global $connection;
            $query = "SELECT id FROM article WHERE 1";
            $ex_q = $connection->query($query);
            if( $connection->error ){
                throw new Exception( "Error al contar artículos: ". $connection->error );
            }
            print_r( $ex_q);
            return $ex_q->num_rows;
        }

        public static function update( $id ){
            // validación de campos
            self::validateFields($_POST);
            // conexión
            global $connection;

            extract($_POST);

            global $currentUser;
            $user_id = $currentUser->id;

            // proteger la edición de un artículo. Un usuario solo puede editar su artículo
            $article = self::getById( $id );

            if( $article->user_id != $user_id){
                throw new Exception( "No tienes permiso para editar el artículo" );
            }
            // query 
            $query = "UPDATE `article` SET `title`='$title',`description`='$description' WHERE id = $id";
    
            // ejecutar query
            $ex_q = $connection->query($query);

            // errores
            if( $connection->error ){
                throw new Exception( "Error al crear artículo: ". $connection->error );
            }
    
            // devolver id
            return $id;

        }


        public static function delete( $id ){
  
            // conexión
            global $connection;

            extract($_POST);

            global $currentUser;
            $user_id = $currentUser->id;

            // proteger el borrado de un artículo. Un usuario solo puede editar su artículo
            $article = self::getById( $id );

            if( $article->user_id != $user_id){
                throw new Exception( "No tienes permiso para borrar el artículo" );
            }
            // query 
            $query = "DELETE FROM `article` WHERE id=$id";
    
            // ejecutar query
            $ex_q = $connection->query($query);

            // errores
            if( $connection->error ){
                throw new Exception( "Error al crear artículo: ". $connection->error );
            }

        }


        private static function validateFields($params){
            global $currentUser;

            if( !$currentUser ){
                throw new Exception("No hay usuario logueado");
            }
            if(!isset($params['title']) || empty($params['title'])){
                throw new Exception("El campo título está vacío");
            }
            if(!isset($params['description']) || empty($params['description'])){
                throw new Exception("El campo descripción está vacío");
            }
            if( strlen($params['title']) < 6 ){
                throw new Exception("El título tiene que tener al menos 6 caracteres");
            }
            if( strlen($params['description']) < 40 ){
                throw new Exception("El artículo tiene que tener al menos 40 caracteres");
            }

            // VAlidar $_FILES
            // si viene $_FILES['img'] ---> png? jpg? gif?
            
        }


        private static function saveFile( $id ){
            // Guardar IMAGEN EN uploads
                // crear carpeta /uploads/post_23 --->  mkdir()

                $origen = $_FILES['img']['tmp'];
                $destino = "carpetafinal/".$_FILES['img']['name'];
                // Guardar archivo en /uploads/post_23  --> move_uploaded_file( origen, destino/nommbre.jpg )

        }

    }

?>