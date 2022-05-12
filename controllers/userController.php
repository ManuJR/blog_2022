<?php

    class UserController
    {
        
        public function __construct( )
        {   
            
        }

        public function show( $id ){

            try {
                // ir a por el usuario número 1
                $user = User::getById( $id );

                // Cargar la vista del usuario
                require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/user/show.php");
                
            } catch (\Throwable $th) {
                echo "ERROR: ".$th->getMessage();

            }

        }

        public function signup() {
            try {
                
                print_r( $_POST ); // email, password

                User::signup();         // POST email , password
                $user = User::login();  // POST email , password
                                 
                header("Location: ".FOLDER."/");

                
            } catch (\Throwable $th) {

                $error = $th->getMessage();
                require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/views/user/signup.php"); 


            }
        }


        public function login(){
            try {
                
                $user = User::login(); // User Object()
                header("Location: ".FOLDER."/");
            } catch (\Throwable $th) {
                
                print_r($th->getMessage());
            }
        }


        public function logout(){
            try {
                global $currentUser;
                if( $currentUser ){
                    $currentUser->logout();
                }
                header("Location: ".FOLDER."/");
            } catch (\Throwable $th) {
                
                print_r($th->getMessage());
            }
        }


    }
    


?>