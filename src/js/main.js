let availableKeywords = [
  'McDonald\'s',
  'Burger King',
  'KFC',
  'Pizza Hut',
  'Domino\'s Pizza',
  'Telepizza',
  'Pans & Company',
  'VIPS',
  'Foster\'s Hollywood',
  'Subway',
  'Taco Bell',
  'Burger King',
  'The Good Burger (TGB)',
  'Kentucky Fried Chicken (KFC)',
  'Papa John\'s',
];

const resultsBox = document.querySelector(".result-box");
const inputBox = document.getElementById("input-box");

inputBox.onkeyup = function(){
  let result = [];
  let input = inputBox.value;
  if(input.length){
    result = availableKeywords.filter((keyword)=>{
      return keyword.toLowerCase().includes(input.toLowerCase());
    });
    console.log(result);
  }
  display(result);

  if(!result.length){
    resultsBox.innerHTML = '';
  }
}

function display(result){
  const content = result.map((list)=>{
    return "<li onclick=selectInput(this)>" + list + "</li>";
  });

  resultsBox.innerHTML = "<ul>" + content.join('') + "</ul>";
}

function selectInput(list){
  inputBox.value = list.innerHTML;
  resultsBox.innerHTML = '';
}

// popup
function openPopup(content) {
  var popup = document.getElementById("popup");
  var popupContent = document.querySelector(".popup-content");
  var popupUrl = '';

  switch(content) {
    case 'ChangeUserDataPopup.php':
      popupUrl = 'view/ChangeUserDataPopup.php';
      break;
    case 'AdressesPopup.php':
      popupUrl = 'view/AdressesPopup.php';
      break;
    case 'HistoryPopup.php':
      popupUrl = 'view/HistoryPopup.php';
      break;
    case 'PlanningPopup.php':
      popupUrl = 'view/PlanningPopup.php';
      break;
    case 'CuponsPopup.php':
      popupUrl = 'view/CuponsPopup.php';
      break;
    case 'WishlistPopup.php':
      popupUrl = 'view/WishlistPopup.php';
      break;
    default:
      popupUrl = 'view/index.php';
  }

  popupContent.innerHTML = '';
  fetch(popupUrl)
    .then(response => response.text())
    .then(data => {
      popupContent.innerHTML = data;
      popup.style.display = "block";
    })
    .catch(error => console.error('Error loading popup content:', error));
}

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
