# Guión de Registro de Usuario

1. Crear en RouterController un GET /signup   --> Vista de views/user/signup.php
2. Crear Vista de views/user/signup.php
3. Enviar datos del Form (action) a POST /user
4. RouterController gestionar POST /user:
    4.1 User::signup()
        4.1.1 Validar datos (datos vengan bien)
        4.1.2 Preguntamos si ese correo está en BBDD
        4.1.3 Metemos datos (CIFRADO!) password --> 123455

    4.2 Gestión del error ---> GET /signup
    4.3 Enviar a GET /user/2



# Guión Login 
1. RouterController --> GET /login --> Cargar vista  views/user/login.php
2. Maquetación de login.php
3. Enviar datos del Formulario de Login --> POST /login (email, password)
4. RouterController --> POST /login:
    4.1 User::login(); 
        4.1.0 Validaciones de campos
        4.1.1 Preguntar a BBDD si el usuario email existe
        4.1.2 Descargar info de ese usuario
        4.1.3 Comprobar que la password sea la que está en BBDD
        4.1.4 LOGIN --> Crear una SESSION de usuario 

    4.2 Gestión del error ---> GET /login
    4.3 Enviar a GET /user/2


# Comprobar si hay Login hecho 
1. Preguntar si hay session o no --> Session.class.php



# Acabar Login y SESSION
1. Proteger /login y /signup cuando estamos logueados
2. Navegador y Footer en todas las vistas
3. Navegador aparezca:
    - Botones de Login y Registro si NO HAY LOGIN
    - Información de usuario (email) y Botón Logout SI HAY LOGIN
4. Logout funcionalidad
    - navigator -> POST /logout 
    - RouterController acepte esa ruta POST /logout
    - Session logout()
        - Eliminar datos de SESSION
        - Eliminar cookie de session
        - Destruir SESSION
        - Borrar propiedades del objeto $session
    - Redirigir al usuario / o /login
    
5. Solo permitir al usuario número :id que vea el user/:id. User 3 ---> solo puede ver /user/3
6. Proteger /user/id  con LOGIN 



PROYECTO FINAL: BLOG / Porfolio / Red Social ...
1. Articulo
    - titulo, descripción, media (imagen, vídeo... etc, autor )

2. Vista pública de artículos

3. Dashboard de edición de artículo:
    - Podemos acceder si LOGIN
    - Solo podremos acceder/ editar nuestros artículos si soy el autor

CRUD de Artículo
- Crear nuevo artículo
- Editar artículo ( siendo el autor )
- Borrar el artículo (siendo el autor )
- Ver el artículo
- Listado de Artículos Paginado

Búsqueda de artículos por nombre
Implementar AJAX en algún formulario ( login, búsqueda...)
Comentarios a las publicaciones
Likes a las publicaciones
Categorías 


1. Qué queremos hacer? --> 
2. Identificar los requisitos
3. Modelar BBDD --> 
4.  

