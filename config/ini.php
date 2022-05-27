<?php
    // DEBUG ERRORS
    ini_set('display_errors', "1");
    error_reporting(E_ALL);
    

    // Cargar los controladores y los modelos
    
    // Controladores
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/controllers/routerController.php");
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/controllers/userController.php");
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/controllers/webController.php");
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/controllers/articleController.php");
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/controllers/commentController.php");
    
    // Modelos
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/models/dbconnection.class.php");
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/models/user.class.php");
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/models/session.class.php");
    require_once($_SERVER['DOCUMENT_ROOT'].FOLDER."/models/article.class.php");
    

/*  // Archivo de Configuración y carga de ficheros
    spl_autoload_register( function($class_name){

        
        // si existe la el archivo en /models , cargo el model
        if( is_file($_SERVER['DOCUMENT_ROOT']."/models/".$class_name.".class.php") ){
            require_once($_SERVER['DOCUMENT_ROOT']."/models/".$class_name.".class.php");
        }

       
        // si existe el archivo en /controllers , cargo el controller
        if( is_file($_SERVER['DOCUMENT_ROOT']."/controllers/".$class_name.".php") ){
            require_once($_SERVER['DOCUMENT_ROOT']."/controllers/".$class_name.".php");
        }

    } ); */


?>