<?php
    /**
     * Controlador Principal que se encarga de manejar las rutas
     */
    class RouterController
    {
        private $method;
        private $uri;

        public function __construct(){
            $this->method   =   $_SERVER['REQUEST_METHOD'];
            $this->uri      =   str_replace( FOLDER, "",  $_SERVER['REQUEST_URI']); 
      
        }

      
        public function manageUris(){
           
            $webController = new WebController();
            $userController = new UserController();
            
            if( $this->method == "GET" && ( $this->uri == "/" || $this->uri == "/home") ){
                $webController->index();
            }

            if( $this->method == "GET" && $this->uri == "/services"){
                $webController->services(); 
            }

            if( $this->method == "GET" && $this->uri == "/signup"){
                $webController->signup();
            }

            if( $this->method == "POST" && $this->uri == "/signup" ){
                // Registro de usuario               
                $userController->signup();
            }

            if( $this->method == "GET" && $this->uri == "/login"){
                $webController->login();
            }

            if( $this->method == "POST" && $this->uri == "/login" ){
                // LOGIN de usuario              
                $userController->login();
            }



            // /user/:id
            if( $this->method == "GET" && preg_match("/^\/user\/[0-9]+$/i", $this->uri) ){
                $id = str_replace("/user/", "", $this->uri);
                $userController->show( $id );

            }

        }
        
    }
    



?>