## FLOW de MVC

1. Definir ruta: GET /article/:id
2. Poner ruta en RouterController 
3. Llamar a un método de ArticleController 
4. Crear ese método ( show() ) en ArticleController
    Pedir datos al modelo o ejecutar algo del modelo (creación..)
    Cargar una vista 
    Ambas cosas



POST /article

ROUTERCONTROLLER
    articleController->create()

ARTICLECONTROLLER
    Article::create()
    redirijo

    ---> error? 

