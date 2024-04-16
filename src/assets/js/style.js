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

        $(".restart-cookies").append("<button>Cookies</button>");
    }
)

// Open cookies
$(".restart-cookies").click(
    function(){
        $(".cookies").css(
            {"display":"inline-block"}
        )

        $(".restart-cookies button").remove();
    }
)

// User can show & hide the menu
$('#menu-toggle').click(function() {
    $('#menu-content').toggleClass('menu-visible');
    $('#menu-toggle').css({"display":"none"})
});

$('#menu-close').click(function() {
    $('#menu-content').toggleClass('menu-visible');
    $('#menu-toggle').css({"display":"inline-block"})
})



//JQUERY VALIDATE

$("#register").validate ({

    rules: {
            user:{
                required:true,
                minlength:3,
                maxlength:13

            },
            mail: {
                requied:true,
                mail:true
                    },
        password: {
            required: true,
            minlenth: 5
        },

        messages: {
            mail: {
                required: "El correo es obligatorio",
            },
         }




        }
    }
    )
$("#login").validate ({


    
})