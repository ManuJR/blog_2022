<?php
  

  const FOLDER = "";
  
  require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/config/ini.php");
  
    // conectando a BBDD
  $connect_obj = new DBConnection();
  $connection = $connect_obj->getConnection();
 
  $currentUser = User::isLogged(); // User Object / false 


  // se va a encargar de analizar Rutas y hacer cosas en consecuencia
  $rc = new RouterController();

  $rc->manageUris();
    

?>