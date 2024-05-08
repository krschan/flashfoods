// cookies localstorage
$(document).ready(function () {
    if (localStorage.getItem('cookiesAccepted') === 'true') {
        $("#cookies").css({ "display": "none" });
        $(".login-button a").css({ "display": "flex" });
    }

    // after user clicks accept on cookies it hides afterwards.
    $(".cookies-accept").click(
        function () {
            $("#cookies").css(
                { "display": "none" }
            );
            $(".login-button a").css(
                { "display": "flex" }
            )

            localStorage.setItem('cookiesAccepted', 'true');
        }
    );

    // close cookies but it show in right top.
    $(".cookies-close").click(
        function () {
            $("#cookies").css(
                { "display": "none" }
            );

            $(".cookies-restart").css(
                { "display": "flex" }
            );
            $(".cookies-restart").append("<button>Cookies</button>");
        }
    );

    // user can open cookies again
    $(".cookies-restart").click(
        function () {
            $("#cookies").css(
                { "display": "flex" }
            );

            $(".cookies-restart").css(
                { "display": "none" }
            );

            $(".cookies-restart button").remove();
        }
    );

    // JQUERY VALIDATE
    $("#login").validate({
        rules: {
            username: {
                required: true,
                minlength: 3
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            username: {
                required: "Please enter your username",
                minlength: "Username must be at least 3 characters long"
            },
            password: {
                required: "Please enter your password",
                minlength: "Password must be at least 8 characters long"
            }
        },
        submitHandler: function (form) {
            form.submit();
        }
    });


    $("#register").validate({

        rules: {
            mail: {
                required: true,
                email: true
            },
            username: {
                required: true,
                minlength: 3,
                maxlength: 13
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            mail: {
                required: "The email is required",
                email: "Enter a valid email address"
            },
            username: {
                required: "The username is required",
                minlength: "It must be at least 3 characters long",
                maxlength: "It must be at most 13 characters long"
            },
            password: {
                required: "The password is required",
                minlength: "The password must be at least 8 characters long"
            }
        }
    });

    $("#register-admin").validate({

        rules: {
            mail: {
                required: true,
                email: true
            },
            username: {
                required: true,
                minlength: 3,
                maxlength: 13
            },
            password: {
                required: true,
                minlength: 8
            }
        },
        messages: {
            mail: {
                required: "The email is required",
                email: "Enter a valid email address"
            },
            username: {
                required: "The username is required",
                minlength: "It must be at least 3 characters long",
                maxlength: "It must be at most 13 characters long"
            },
            password: {
                required: "The password is required",
                minlength: "The password must be at least 8 characters long"
            }
        }
    });

    $("#information").validate({

        rules: {
            username: {
                required: true,
                maxlength: 13,
                minlength: 3
            },
            nameSurname: {
                required: true,
                maxlength: 25,
                minlength: 3

            },
            email: {
                required: true,
                email: true
            },
            birthDate: {
                required: true,

            },
            phoneNumberr: {
                required: true,
                minlength: 9
            }

        },
        messages: {
            username: {
                required: "The username is required",
                maxlength: "It must be at most 13 characters long",
                minlength: "It must be at least 3 characters long"
            },
            nameSurname: {
                required: "The name and your first surname are required",
                maxlength: "It must be at most 25 characters long",
                minlength: "It must be at least 3 characters long"

            },
            email: {
                required: "The email is required",
                email: "Enter a valid email address"
            },
            birthDate: {
                required: "The birthdate is required",

            },
            phoneNumberr: {
                required: "The phone number is required",
                minlength: "The phone number must be at least 9 digits long"
            }
        }
    });

    $(document).ready(function(){
        $("#formAdmin").validate({
            rules : {
                name : {
                    required:true,
                    minlength:2
                },
                phone : {
                    required:true,
                    minlength:9,
                    maxlength:20
                },
                email : {
                    required:true,
                    email:true
                },
                Description:{
                    required:true,
                    minlength:5,
                    maxlength:12
                }
            },
                messages:{
                    name : {
                        required: "The name is required",
                        minlength: "It must be at least 2 characters long"
                    },
                    phone : {
                    required: "The username is required",
                    maxlength: "It must be at most 20 characters long",
                    minlength: "The phone number must be at least 9 digits long"
                    },
                    email : {
                        required: "The email is required",
                        email: "Enter a valid email address"
                  },
                  Description : {
                    required: "The name and your first surname are required",
                    maxlength: "It must be at most 25 characters long",
                    minlength: "It must be at least 3 characters long"
                  },
                }});

    // SLICK CAROUSEL
    $(".slick-carousel").slick({
        dots: false,
        infinite: true,
        speed: 300,
        slidesToShow: 3,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 2000,
        arrows: true,
        prevArrow: "<button class='slick-prev'><</button>",
        nextArrow: "<button class='slick-next'>></button>",
        responsive: [
            {
                breakpoint: 1200,
                settings: {
                    slidesToShow: 2,
                    arrows: true,
                    dots: false
                }
            },
            {
                breakpoint: 992,
                settings: {
                    slidesToShow: 1,
                    arrows: true,
                    dots: false
                }
            }
        ]
    });
});