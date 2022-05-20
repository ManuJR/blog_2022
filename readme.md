# Patrón Modelo Vista Controlador

1. Todas las peticiones van a ir a index.php
2. Recoger las urls y enviar la responsabilidad de qué hacer a los controladores
3. Controladores harán preguntas BBDD y cargaran las vistas



CASCADA
    DELETE PEPE --> DELETE ARTICULOS 
                --> DELETE COMENTARIOS

RESTRICT
    DELETE PEPE --> DELETE ARTICULOS 
                --> DELETE COMENTARIOS   

NULL
    


PEPE

    Articulo 1
        titulo
        texto
        img_1
        img_2
        img_2

    Articulo 2
    Articulo 3
    Articulo 4
    Articulo 5









INDEX.PHP (Controlador principal)

    /profesor/1   -->
                        1. GET * FROM PROFESOR WHERE id = 1
                        2. Require_once(profesor.php)

    /home/          --> require_once(home.php)

    /contacto


    /profesor/edit/1  ---> edit_profesor.php...



CRUD : CREATE READ UPDATE DELETE
    CREATE          POST  /profesor                 --> ProfesorController create()
    READ ONE        GET   /profesor/{id}            --> ProfesorController show() 
                                                            { Obtener profesor y mostrar vista }
    READ LIST       GET   /profesores
    UPDATE          POST  /profesor/{id}
    DELETE          POST  /profesor/delete/{id}

    VIEWS
        UPDATE     GET     /profesor/edit/{id}
        CREATE     GET     /profesor/create



WEB CONTROLLER
    --> ProfesorController
    --> HomeController  
    --> ContactController 



WEB
    GET     / o /home       --> home.php
    GET     /servicios      --> servicios.php
    GET     /quienes-somos  --> about.php
    GET     /login          --> login.php
    GET     /register       --> sigunp.php

ARTICULOS  (CRUD)

    READ        GET     /articulo/1     
                                        Articulo::getByID(1)
                                    --> articulo.php
                GET     /articulo/create     
                            --> views/article/create.php
    CREATE      POST    /articulo
                        Article::create();

    DELETE      POST    /articulo/delete/2
                        $articulo = Articulo::findByID(2)
                        $articulo->delete();

    UPDATE      POST    /articulo/edit/2
                        $articulo = Articulo::findByID(2)
                        $articulo->edit();




GET     /servicios
        --> require_once("views/servicios.php");

GET     /user/1
    1. Ir a buscar el usuario número
        $user = User::findByID(1);

    2. Cargar una vista, con la info de $user
        require_once("views/user.php")
        
POST    /user/1



1. Como pediríamos datos a un modelo desde el controlador
2. Registro de Usuario
         2.1 GET     /signup    --> maquetación de formulario views/user/create.php
         
         2.2 POST    /signup    --> 
                        ruta en Controlador 
                        método create() en UserController
                        método create() en User
                        redirigir al /login

3. Login 
    2.1 Vista /login --> formulario login.php
    2.2 POST /login   --> Comprobar en BBDD el login
    2.3 CREAR SESSION
    2.4 Preguntar por la session



GET /user/56





1. Logout
    POST /logout  
2. No acceder a /signup si estamos logueados

3. BLOG
    1. Articulos
        titulo, descripción, imagen, autor
    
    1.2. CRUD Articulos
        Creación (formulario de creación) 
            --> imagen
        Edición (formulario de edición)
        Vista 
        Borrado ( si eres el autor )
    Listado de artículos con paginación

    2. Usuarios
        nombre, apellidos, imagen

    2.1. Página de perfil del usuario
        Información
        Artículos creados
    2.2. Página de edición del usuario
        
    2.3 Borrado de usuario?


    Ideas: 
        Comentarios en Artículos
        Categorías en Artículos
        Filtrado de artículos en la home en base a categorías
        Buscador de artículos
        Listado de artículos favoritos...










# BLOG

Un usuario tiene que estar registrado y logueado para escribir un artículo
Un usuario puede escribir muchos artículos. Un artículo lo escribe un usuario
Un artículo tiene al menos título, un texto largo, un autor que lo escribe y una imagen (de portada), y creado en ( categorías, subtítulo... )
Un usuario puede tener un email, password, nombre, apellidos, imagen.... 


## Comentarios
Un comentario lo realiza un usuario (logueado? no logueado?) en un artículo
Un artículo tiene muchos Comentarios
Fecha de creación, el comentario, nick? 






CRUD Articulo

CREACION
    GET     /article/new        ---> VISTA
    POST    /article/new        ---> ACCION (meter el artículo en BBDD y redigir a vista)

READ
    GET     /article/:id        --> ACCION y VISTA (coger artículo :id de la BBDD y cargar vista)

EDICION 
    GET     /article/edit/:id   --> ACCION y VISTA (coger artículo :id de la BBDD y cargar vista)
    POST    /article/edit/:id   --> ACCION (Actualizar el artículo en BBDD y redigir a vista)
    
BORRADO
    POST    /article/delete     --> ACCION (Borrar el artículo en BBDD y redigir a home)