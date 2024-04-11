// Carousel filters for food
$("#filters").slick({
    dots: false,
    infinite: true,
    speed: 3000, // Velocidad de transición de los slides
    slidesToShow: 4,
    autoplay: true,
    autoplaySpeed:0,
    arrows: false,
    cssEase:"linear"
    
});


// Zoom
$("+").click (
    function () {
        this.classList.toggle('zoom');


    }
)

$("-").click (
    function () {
        this.classList.toggle('zoom');


    }
)

// After user clicks accept on cookies it hides afterwards.
$(".button-accept").click(
    function(){
        $(".cookies").css(
            {"display":"none"}
        );
        $("#login").css(
            {"display":"inline-block"}
        )
    }
)

// Close cookies but it show in right top.
$(".button-close").click(
    function(){
        $(".cookies").css(
            {"display":"none"}
        )

        $(".newdiv").append("<div" + Cookies + "'/div>");
    }
)



// EJEMPLO

// // 7.2. 1.5p] Crea un nou formulari que permeti afegir un nou gènere al formulari anterior validant
// // que com mínim tingui entre 2 y 7 lletres.


// $("#formulariGenere").validate({
//     rules:{
//         nomgenere:{
//             required: true
//         }
//     },
//     messages:{
//         nomgenere:{
//             required:"Entre 2 i 7 caràcters."
//         }
//     },
// });

// $("#formulariGenere").valid();

// let genere_llista = 3; // Número 3 perquè ja tinc 3 generes en el html.

// $("#nouGenere").click(function() {

//     genere_llista++;

//     let nou_genere = $("input[name=nomgenere]").val();

//     $(".checkbox").append("<input type='checkbox' name='genere' id='genere" + genere_llista + "' value='" + nou_genere + "'><label>"+ nou_genere+"</label>");

//     $("#nouGenereMissatge").text("Gènere afegit correctament!").css("color", "green");

// });

// User can hide or show the menu
$(document).ready(function() {
    $('#menu-toggle').click(function() {
        $('#menu-content').toggleClass('menu-visible');
    });
});
