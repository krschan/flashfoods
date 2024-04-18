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
$(".zoom-in").click (
    function () {
        this.classList.toggle('zoom');


    }
)

$(".zoom-out").click (
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
                required:true,   
                email:true
                    },
        password: {
            required: true,
            minlength: 8
        }
    },
    messages: {
        mail: {
            required: "El correo es obligatorio",
            email: "Introduce una dirección válida   "
        },
    user:{
        required:"El usuario es obligatorio",
        minlength:"Debe tener almenos 3 caracteres",
        maxlength: "Debe ser de macimo 13 caracteres"
        },
    password: {
        required: "La contraseña es obligatoria",
        minlength:"La contraseña debe tener minimo 8 caracteres"

        }
    }
});
    

$("#login").validate ({
    rules: {
        username: {
            required:true,
            minlength: 3

        },
        password:  {
        required:true,
        minlength: 8

        }
    },
    messages: {
        username:  {
            required: "El usuario es obligatorio ",
            minlength: "El usuario debe tener minimo 3 caracteres"

        },
        password: {
            required: "La contraseña es obligatoria",
            minlength: "La contraseña debe tener minimo 8 caracteres"
        }
    }
    });

// Keywords list
const availableKeywords = [
    'McDonald`s',
    'Burger King',
    'KFC',
    'Wendy`s',
    'Subway',
    'Taco Bell',
    'Pizza Hut',
    'Domino`s Pizza',
    'Chipotle Mexican Grill',
    'Five Guys',
    'Arby`s',
    'Popeyes Louisiana Kitchen',
    'Chick-fil-A',
    'Dairy Queen',
    'Jimmy John`s'
];

// Get DOM elements
const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("search");

// Function to filter and display results
function filterAndDisplayResults(input) {
    const filteredResults = availableKeywords.filter(keyword =>
        keyword.toLowerCase().includes(input.toLowerCase())
    );
    if (filteredResults.length > 0) {
        resultsBox.innerHTML = "<ul>" + filteredResults.map(result => `<li>${result}</li>`).join('') + "</ul>";
        resultsBox.style.display = "block";
    } else {
        resultsBox.innerHTML = "";
        resultsBox.style.display = "none";
    }
}

// Event listener for keyup event on search input
inputBox.addEventListener("keyup", function() {
    const input = inputBox.value.trim();
    if (input.length > 0) {
        filterAndDisplayResults(input);
    } else {
        resultsBox.style.display = "none";
    }
});

// Event listener for click event on search results
resultsBox.addEventListener("click", function(event) {
    if (event.target.tagName === "LI") {
        const selectedRestaurant = event.target.innerText;
        switch (selectedRestaurant) {
            case "McDonald`s":
                window.location.href = "mcdonalds.html";
                break;
            // Add more restaurants
            default:
                break;
        }
    }
});
