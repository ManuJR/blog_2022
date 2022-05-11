<?php

  const FOLDER = "";
  
  require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/config/ini.php");
 
  $currentUser = User::isLogged(); // User Object / false 

 
  //print_r($currentUser);

 
  // conectando a BBDD
  $connect_obj = new DBConnection();
  $connection = $connect_obj->getConnection();

  // se va a encargar de analizar Rutas y hacer cosas en consecuencia
  $rc = new RouterController();
  print_r($rc);
  echo "<br>";
  echo "<br>";
  echo "<br>";
  $rc->manageUris();
    

?>