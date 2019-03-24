$("#darkTrigger").click(function(){

    /*if ($("body").hasClass("dark")){
        $("body").removeClass("dark");
    }
    else{
        $("body").addClass("dark");
    } */

    $("body").toggleClass("dark")
    $( "div.container" ).toggleClass( "dark" );
    $("span.subtitle").toogleClass("dark");
    
});

/* activation en fonction de l'heure

$(document).ready(function () {
    const d = new Date();
    const n = d.getHours();

    if(n > 17 || n < 8){
        $("body").addClass("dark");
    }
}); */