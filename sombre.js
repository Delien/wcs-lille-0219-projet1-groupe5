 // garde le changement de theme en mémoire lors d'un changement de page

// fonction dark globale

const darkbutton = () => {
    $("body").toggleClass("dark")
    $( "div.container" ).toggleClass( "dark" );
    $("span.subtitle").toogleClass("dark");
}

// script du bouton

$("#darkTrigger").click(function(){
    darkbutton() ;
    $("body").toggleClass("active")      
});

// choix du theme automatique en fonction de l'heure locale (format h24)

$(document).ready(function () {
    const d = new Date();
    const n = d.getHours();

    if(n > 17 || n < 8){
        darkbutton();
    }
})

