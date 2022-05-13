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

    }

?>