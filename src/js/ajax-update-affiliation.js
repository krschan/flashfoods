$(document).ready(function () {
    $(document).on("click", "#update-ajax-button", function () {
        if ($("#information").valid()) {
            let newName = $("input[name='name']").val();
            let newPhoneNumer = $("input[name='phoneNumber']").val();
            let newEmail = $("input[name='mail']").val();
            let newDescription = $("textarea[name='description']").val();
            let idAffiliation = $("#id_affiliation").val();

            $.ajax({
                url: "../controller/AjaxUpdateAffiliation.php",
                type: "POST",
                dataType: "json",
                data: {
                    name: newName,
                    phoneNumber: newPhoneNumer,
                    email: newEmail,
                    description: newDescription,
                    id_affiliation: idAffiliation
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