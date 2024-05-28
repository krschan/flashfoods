$(document).ready(function () {
  $("#update-ajax-button").click(function () {
      if ($("#information").valid()) {
          let newName = $("input[name='nameSurname']").val();
          let newBirthDate = $("input[name='birthDate']").val();
          let newPhoneNumber = $("input[name='phoneNumber']").val();
          $.ajax({
              url: "../controller/AjaxUpdateUser.php",
              type: "POST",
              dataType: "json",
              data: {
                nameSurname: newName,
                birthDate: newBirthDate,
                phoneNumber: newPhoneNumber
              },
              success: function (data) {
                  if (data.identifier === "updateSuccess") {
                      $("#validation-message").text(data.message).css("color", "green");
                      
                  } else {
                      $("#validation-message").text(data.message).css("color", "red");
                  }
              },
              error: function () {
                  $("#validation-message").text("Error in the server response").css("color", "red");

              }
          });
      }
  });
});