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

// after user clicks accept on cookies it hides afterwards.
$(".button-accept").click(
    function(){
        $(".cookies").css(
            {"display":"none"}
        )
    }
)


$(document).ready(function() {
    $('#menu-toggle').click(function() {
        $('#menu-content').toggleClass('menu-visible');
    });
});
