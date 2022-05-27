
var cards = document.querySelectorAll(".card");

// DEV
const folder = "";
// PROD
//const folder = "/blog2022";


cards.forEach(function(card){
    card.addEventListener("click", function(){
        let url = this.getAttribute('data-link');
        window.location.href = url;
    });
})

$(document).ready(function(){
    console.log("Cargado");
    // lanzar petición AJAX con cada pulsación de tecla
   // $("#text_search").keyup(function(){
    $("#btn_search").click(function(){
        // 1. Recoger valor del input search
        let search = $("#text_search").val();

        // 2. Hacer peticion por AJAX
        $.ajax({
            url: folder+"/search",
            method: "GET",
            data: {
                search: search
            },
            dataType: "json",

        }).done( function(response){
            // Éxito --> pintaremos los resultados
            console.log("exito")
            console.log(response)
            let articles = response.data;
            // Vaciar artículos que ya hay
            $(".articles").html("");
            let articles_html = "";
            articles.forEach( function(article){
                articles_html += "<div class='card' style='width: 18rem;' data-link='"+folder+"/article/"+article.id+"'><img class='card-img-top' src='"+folder+"/uploads/post_"+article.id+"/"+article.image+"' alt='Card image cap'><div class='card-body'><h5 class='card-title'>"+article.title+"</h5><p class='card-text'>"+article.description.substring(0,100)+"...</p><a href='"+folder+"/article/"+article.id+"' class='btn btn-primary'>Ver</a></div></div>";
            });
            $(".articles").append(articles_html);

        }).fail( function(error){
            // Fracaso --> pintar alert de error 
            console.log("fracaso")
            console.log(error)
        } );

    });

});
