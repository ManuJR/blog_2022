<?php

    class Article{

        private $id;
        private $title;
        private $description;
        private $image;
        private $user_id;
        private $created_at;

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
            // conexión
            global $connection;

            extract($_POST);

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
            // devolver id
            return $article_id;

        }

        public static function list(){
    
            // conexión
            global $connection;
            // query
            $query = "SELECT * FROM article WHERE 1 ORDER BY created_at DESC";
            // ejecutar query
            $ex_q = $connection->query($query);
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
            return $articles;

        }

        private static function validateFields($params){
            global $currentUser;
            print_r($params);
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
            
        }

    }

?>