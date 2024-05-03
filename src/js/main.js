// cookies localstorage
$(document).ready(function() {
  if (localStorage.getItem('cookiesAccepted') === 'true') {
      $("#cookies").css({"display": "none"});
      $(".login-button a").css({"display": "flex"});
  }
});

// after user clicks accept on cookies it hides afterwards.
$(".cookies-accept").click(
  function(){
      $("#cookies").css(
          {"display":"none"}
      );
      $(".login-button a").css(
          {"display":"flex"}
      )

      localStorage.setItem('cookiesAccepted', 'true');
  }
);

// close cookies but it show in right top.
$(".cookies-close").click(
  function(){
      $("#cookies").css(
          {"display":"none"}
      );

      $(".cookies-restart").css(
        {"display":"flex"}
      );
      $(".cookies-restart").append("<button>Cookies</button>");
  }
);

// user can open cookies again
$(".cookies-restart").click(
  function(){
      $("#cookies").css(
          {"display":"flex"}
      );

      $(".cookies-restart").css(
        {"display":"none"}
      );

      $(".cookies-restart button").remove();
  }
);

//JQUERY VALIDATE
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

$("#register").validate ({

  rules: {
      mail: {
          required:true,   
          email:true
      },
      username:{
          required:true,
          minlength:3,
          maxlength:13
      },
      password: {
          required: true,
          minlength: 8
      }
  },
  messages: {
      mail: {
          required: "El correo es obligatorio",
          email: "Introduce una dirección válida"
      },
      username:{
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

$("#register-admin").validate ({

  rules: {
      mail: {
          required:true,   
          email:true
      },
      username:{
          required:true,
          minlength:3,
          maxlength:13
      },
      password: {
          required: true,
          minlength: 8
      }
  },
  messages: {
      mail: {
          required: "El correo es obligatorio",
          email: "Introduce una dirección válida"
      },
      username:{
          required:"El usuario es obligatorio",
          minlength:"Debe tener almenos 3 caracteres",
          maxlength: "Debe ser de máximo 13 caracteres"
      },
      password: {
          required: "La contraseña es obligatoria",
          minlength:"La contraseña debe tener minimo 8 caracteres"
      }
  }
});

$("#information").validate ({

  rules: {
      username: {
          required: true,
          maxlength: 13,
          minlength:3
      },
      nameSurname: {
          required: true,
          maxlength: 25,
          minlength: 3

      },
      email: {
          required:true,   
          email:true
      },
      birthDate: {
          required:true,   
              
      },
      phoneNumberr: {
          required:true,   
          minlength: 9    
      }
  
  },
  messages: {
      username: {
          required:"El usuario es obligatorio",
          maxlength: "Debe ser de máximo 13 caracteres",
          minlength:"Debe tener almenos 3 caracteres"
      },
      nameSurname: {
          required: "El nombre y tu primer apellido son obligatorios",
          maxlength: "Debe ser de máximo 25 caracteres",
          minlength:"Debe tener almenos 3 caracteres"

      },
      email: {
          required:"El correo es obligatorio",   
          email:"Introduce una dirección válida"
      },
      birthDate: {
          required:"La fecha de nacimiento es obligatoria",   
          
      },
      phoneNumberr: {
          required:"El telefono es obligatorio",   
          minlength:"El número de telefono debe tener minimo 9 digitos"
      }
  }
});

// SLICK CARROUSEL
$("#slider").slick({
  dots: true,
  infinite: true,
  speed: 300,
  slidesToShow: 3,
  slidesToScroll: 1,
  autoplay: true,
  autoplaySpeed: 2000,
  arrows: false,
  prevArrow: "<button class='prev'>PREV</button>",
  nextArrow: "<button class='next'>NEXT</button>",
  responsive:[
      {
          breakpoint: 800,
          settings:{
              slidesToShow: 2,
              arrows: false,
              dots: false
          }
      },

      {
          breakpoint: 600,
          settings:{
              slidesToShow: 1,
              arrows: false,
              dots: false,
          }
      }
  ]
});
