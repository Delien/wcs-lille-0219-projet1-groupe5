 // garde le changement de theme en mémoire lors d'un changement de page

// fonction dark globale

const darkbutton = () => {
    $("body").toggleClass("dark")
    $( "div.container" ).toggleClass( "dark" );
    $("span.subtitle").toggleClass("dark");
    let src = ($('#logosite').attr('src') === 'picture/logowildJ.png')    
? 'picture/logowildN.png'
: 'picture/logowildJ.png';
$('#logosite').attr('src', src)
}

// script du bouton

$("#darkTrigger").click(function(){
    darkbutton() ;   
});

// choix du theme automatique en fonction de l'heure locale (format h24)

$(document).ready(function () {
    const d = new Date();
    const n = d.getHours();

    if(n > 17 || n < 8){
        darkbutton();
    }
})

