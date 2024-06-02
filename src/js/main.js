// cookies localstorage
$(document).ready(function () {
  if (localStorage.getItem("cookiesAccepted") === "true") {
    $("#cookies").css({ display: "none" });
    $(".login-button a").css({ display: "flex" });
  }
});

// after user clicks accept on cookies it hides afterwards.
$(".cookies-accept").click(function () {
  $("#cookies").css({ display: "none" });
  $(".login-button a").css({ display: "flex" });

  localStorage.setItem("cookiesAccepted", "true");
});

// close cookies but it show in right top.
$(".cookies-close").click(function () {
  $("#cookies").css({ display: "none" });

  $(".cookies-restart").css({ display: "flex" });
  $(".cookies-restart").append("<button>Cookies</button>");
});

// user can open cookies again
$(".cookies-restart").click(function () {
  $("#cookies").css({ display: "flex" });

  $(".cookies-restart").css({ display: "none" });

  $(".cookies-restart button").remove();
});

// JQUERY VALIDATE
$("#login").validate({
  rules: {
    username: {
      required: true,
      minlength: 3,
    },
    password: {
      required: true,
      minlength: 8,
    },
  },
  messages: {
    username: {
      required: "Please enter your username",
      minlength: "Username must be at least 3 characters long",
    },
    password: {
      required: "Please enter your password",
      minlength: "Password must be at least 8 characters long",
    },
  },
  submitHandler: function (form) {
    form.submit();
  },
});

$("#register").validate({
  rules: {
    mail: {
      // required: true,
      // email: true,
    },
    username: {
      required: true,
      minlength: 3,
      maxlength: 13,
    },
    password: {
      required: true,
      minlength: 8,
    },
  },
  messages: {
    mail: {
      // required: "The email is required",
      // email: "Enter a valid email address",
    },
    username: {
      required: "The username is required",
      minlength: "It must be at least 3 characters long",
      maxlength: "It must be at most 13 characters long",
    },
    password: {
      required: "The password is required",
      minlength: "The password must be at least 8 characters long",
    },
  },
});

$("#register-admin").validate({
  rules: {
    mail: {
      // required: true,
      // email: true,
    },
    username: {
      required: true,
      minlength: 3,
      maxlength: 13,
    },
    password: {
      required: true,
      minlength: 8,
    },
  },
  messages: {
    mail: {
      // required: "The email is required",
      // email: "Enter a valid email address",
    },
    username: {
      required: "The username is required",
      minlength: "It must be at least 3 characters long",
      maxlength: "It must be at most 13 characters long",
    },
    password: {
      required: "The password is required",
      minlength: "The password must be at least 8 characters long",
    },
  },
});

$("#information").validate({
  rules: {
    username: {
      required: true,
      maxlength: 13,
      minlength: 3,
    },
    nameSurname: {
      required: true,
      maxlength: 25,
      minlength: 3,
    },
    email: {
      required: true,
      email: true,
    },
    birthDate: {
      required: true,
    },
    phoneNumberr: {
      required: true,
      minlength: 9,
    },
  },
  messages: {
    username: {
      required: "The username is required",
      maxlength: "It must be at most 13 characters long",
      minlength: "It must be at least 3 characters long",
    },
    nameSurname: {
      required: "The name and your first surname are required",
      maxlength: "It must be at most 25 characters long",
      minlength: "It must be at least 3 characters long",
    },
    email: {
      required: "The email is required",
      email: "Enter a valid email address",
    },
    birthDate: {
      required: "The birthdate is required",
    },
    phoneNumberr: {
      required: "The phone number is required",
      minlength: "The phone number must be at least 9 digits long",
    },
  },
});

$(document).ready(function () {
  $("#formAdmin").validate({
    rules: {
      name: {
        required: true,
        minlength: 2,
      },
      phone: {
        required: true,
        minlength: 9,
        maxlength: 20,
      },
      email: {
        required: true,
        email: true,
      },
      description: {
        required: true,
        minlength: 5,
        maxlength: 12,
      },
    },
    messages: {
      name: {
        required: "The name is required",
        minlength: "It must be at least 2 characters long",
      },
      phone: {
        required: "The username is required",
        maxlength: "It must be at most 20 characters long",
        minlength: "The phone number must be at least 9 digits long",
      },
      email: {
        required: "The email is required",
        email: "Enter a valid email address",
      },
      description: {
        required: "The name and your first surname are required",
        maxlength: "It must be at most 25 characters long",
        minlength: "It must be at least 3 characters long",
      },
    },
  });
});

// SLICK CAROUSEL
$("#information").validate({
  rules: {
    username: {
      required: true,
      maxlength: 13,
      minlength: 3,
    },
    nameSurname: {
      required: true,
      maxlength: 25,
      minlength: 3,
    },
    email: {
      required: true,
      email: true,
    },
    birthDate: {
      required: true,
    },
    phoneNumberr: {
      required: true,
      minlength: 9,
    },
  },
  messages: {
    username: {
      required: "The username is required",
      maxlength: "It must be at most 13 characters long",
      minlength: "It must be at least 3 characters long",
    },
    nameSurname: {
      required: "The name and your first surname are required",
      maxlength: "It must be at most 25 characters long",
      minlength: "It must be at least 3 characters long",
    },
    email: {
      required: "The email is required",
      email: "Enter a valid email address",
    },
    birthDate: {
      required: "The birthdate is required",
    },
    phoneNumberr: {
      required: "The phone number is required",
      minlength: "The phone number must be at least 9 digits long",
    },
  },
});
document.addEventListener("DOMContentLoaded", function() {
  // get the elements
  var nav = document.querySelector("nav");
  var menuIcon = document.getElementById("menu-icon");
  var isOpen = false;

  // get the overlay element
  var overlay = document.querySelector(".overlay");

  // function to open the nav menu
  function openNav() {
    nav.style.width = "280px"; // set the width to 280px
    isOpen = true;
    document.body.classList.add("menu-open");
    overlay.style.display = "block";
    overlay.style.opacity = "0.8";
    // add event listener to close nav menu when clicking outside
    document.addEventListener("click", closeNavOutside);
  }

  // function to close the nav menu
  function closeNav() {
    nav.style.width = "90px"; // width as per your CSS
    isOpen = false;
    document.body.classList.remove("menu-open");
    overlay.style.display = "none";
    overlay.style.opacity = "0";
    // remove event listener to close nav menu when clicking outside
    document.removeEventListener("click", closeNavOutside);
  }

  // function to close nav menu when clicking outside
  function closeNavOutside(event) {
    if (!nav.contains(event.target) && isOpen) {
      closeNav();
    }
  }

  // add event listener to open nav menu when menu icon is clicked
  menuIcon.addEventListener("click", function() {
    if (!isOpen) {
      openNav();
    } else {
      closeNav();
    }
  });

  var menuItems = document.querySelectorAll("nav ul li");
  menuItems.forEach(function(item) {
    item.addEventListener("click", function() {
      openOverlay();
    });
  });
});

