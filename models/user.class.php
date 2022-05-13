<?php

    class User extends DBConnection {
        private $id;
        private $email;
        private $password;
        private $created_at;
       

        public function __construct( $params ){
            foreach ($params as $key => $value) {
                $this->$key = $value;
            }
        }

        function __get($name){
            return $this->$name;
        }

        // Obtiene usuario de la BBDD y devuelve un User Object
        public static function getById( $id ){
            // conectar a BBDD
            global $connection;
            // SQL query
            $query = "SELECT * FROM user WHERE id = $id";

            // ejecutar query 
            $execq = $connection->query($query);

            if( $connection->error ){
                throw new Exception( "Error al obtener usuario: ". $connection->error );
            }

            if( $execq->num_rows != 1 ){
                throw new Exception( "No se encuentra al usuario" );
            }

            // recoger usuario 
            $user_bd = $execq->fetch_assoc();

            $user = new User( $user_bd );

            return $user;
            // devolver un User Object

        }
        
        public static function signup(){
            if( !self::validateFields() ){
                throw new Exception("Campos no válidos");
            }

            global $connection;
            $email = $_POST['email'];

            $query_email = "SELECT id FROM user WHERE email = '$email'";
            $exec_q_email = $connection->query( $query_email );

            if( $connection->error ){
                throw new Exception( "Error al obtener usuario por email: ". $connection->error );
            }
            if( $exec_q_email->num_rows !=0 ){
                throw new Exception("Este usuario ya está registrado");
            }

            $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
            
            $query_insert = "INSERT INTO `user`(`email`, `password`) VALUES ('$email','$password')";
            $connection->query($query_insert);

            if( $connection->error ){
                throw new Exception( "Error al crear usuario: ". $connection->error );
            }
        }

        // POST email
        // POST password
        public static function login(){

            // Validación de campos
            if( !self::validateFields() ){
                throw new Exception("Campos no válidos");
            }

            // preguntar si existe un usuario por email
            global $connection;
            $email = $_POST['email'];

            $query_email = "SELECT * FROM user WHERE email = '$email'";
            $exec_q_email = $connection->query( $query_email );
            

            if( $connection->error ){
                throw new Exception( "Error al obtener usuario por email: ". $connection->error );
            }

            if ($exec_q_email->num_rows != 1 ){
                throw new Exception( "El usuario no está registrado");
            }
            
            $user_bbdd = $exec_q_email->fetch_assoc();
            $password = $_POST['password'];
           
            if ( !password_verify( $password, $user_bbdd['password'] )){
                throw new Exception( "La contraseña es incorrecta");
            }

            // Hemos hecho LOGIN!
            $user = new User( $user_bbdd );
            print_r($user);

            $user->create_session();

            return $user;

        }

        private function create_session(){
            // 2 
            $_SESSION['id'] = $this->id;
            $_SESSION['email'] = $this->email;

        }


        private static function validateFields(){
            if( 
                !isset($_POST['email']) ||
                !isset($_POST['password']) ||
                empty($_POST['email']) ||
                empty($_POST['password']) 
            ){
                throw new Exception("Campos obligatorios: email y password");
            }
    
            if( !filter_var($_POST['email'], FILTER_VALIDATE_EMAIL ) ){
                return false;
            }

            if( strlen($_POST['password'])<6 ){
                return false;
            }

            return true;
            
        }


        public static function isLogged(){
            session_start();
            if( isset( $_SESSION['id']) ){
               
                $user = new User( $_SESSION );
                return $user;
            }
            return false;
        }

        public function logout(){
            unset($_SESSION);
            setcookie(session_name(), "", time()-1);
            session_destroy();
        }

    }
    

?>