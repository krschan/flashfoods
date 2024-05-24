$(document).ready(function () {
  let isEmailValid = false;

  $("input[name='mail']").blur(function () {
    let mail = $(this).val();

    $.ajax({
      url: "../controller/EmailValidator.php",
      type: "POST",
      dataType: "json",
      data: { mail: mail },
      success: function (data) {
        // in case the message sent as "response" is equal to "Valid message" it shows the following message
        if (data.message === "Valid Email") {
          $("#validation-message")
            .text(data.message)
            .css({ color: "green", display: "block" });
          isEmailValid = true;
          // in case the message sent by "response" is anything else, it shows the following message
        } else {
          $("#validation-message")
            .text(data.message)
            .css({ color: "red", display: "block" });
          isEmailValid = false;
        }
      },
      error: function () {
        $("#request-validation")
          .text("Error processing the request")
          .css({ color: "red", display: "block" });
        isEmailValid = false;
      },
    });
  });

  // in case it is sent for any reason and the boolean is true do the following
  $("#register, #register-admin").submit(function (event) {
    if (!isEmailValid) {
      event.preventDefault();
      $("#validation-message")
        .text("Invalid email, unable to register")
        .css("color", "red");
    }
  });
});
