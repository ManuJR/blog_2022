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
            $articleController = new ArticleController();

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

            if( $this->method == "POST" && $this->uri == "/logout" ){
                $userController->logout();
            }



            // GET /user/:id
            if( $this->method == "GET" && preg_match("/^\/user\/[0-9]+$/i", $this->uri) ){
                $id = str_replace("/user/", "", $this->uri);
                $userController->show( $id );

            }

            // GET /article/:id
            if( $this->method == "GET" && preg_match("/^\/article\/[0-9]+$/i", $this->uri) ){     
                $id = str_replace("/article/", "", $this->uri);
                $articleController->show( $id );
            }
            // GET /article/new
            if( $this->method == "GET" && $this->uri=="/article/new" ){     
                $articleController->new();
            }

            if( $this->method == "POST" && $this->uri=="/article" ){     
               $articleController->create();
            }

            // GET /article/edit/:id
            if( $this->method == "GET" && preg_match("/^\/article\/edit\/[0-9]+$/i", $this->uri)){
                $id = str_replace("/article/edit/", "", $this->uri);
                $articleController->edit_view( $id );
            }

             if( $this->method == "POST" && preg_match("/^\/article\/edit\/[0-9]+$/i", $this->uri)){
                $id = str_replace("/article/edit/", "", $this->uri);
               
                $articleController->edit( $id );
            } 

            if( $this->method == "POST" && preg_match("/^\/article\/delete\/[0-9]+$/i", $this->uri)){
                $id = str_replace("/article/delete/", "", $this->uri);
                $articleController->delete( $id );
                
            }


        }
        
    }
    



?>