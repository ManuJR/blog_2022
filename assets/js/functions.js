
var cards = document.querySelectorAll(".card");

cards.forEach(function(card){
    card.addEventListener("click", function(){
        let url = this.getAttribute('data-link');
        window.location.href = url;
    });
})
