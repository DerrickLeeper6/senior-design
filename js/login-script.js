$(document).ready(function () {
    $("#login_account").click(function () {
        if (verifyLogin()) {
            console.log("Values entered");
            var data = {};
            data.EMAIL = $("#loginEmail").val()
            data.PWD = $("#loginPwd").val()
            $.ajax({
                url: "php/login.php",
                type: "POST",
                data: data,
                success: function (result) {
                    if (result == "Incorrect email") {
                        //They entered their email wrong
                        $("#loginEmail").addClass("error");
                        $("#userEmailLoginError").text("There is no account matching this email.");
                        $("#userEmailLoginError").show();
                    }
                    else if (result == "Invalid password") {
                        //User entered the wrong information.
                        $("#loginPwd").addClass("error");
                        $("#passWordLoginError").text("The email/password you have provided is incorrect");
                        $("#passWordLoginError").show();
                    } else {
                        window.location.href = "restricted/"
                    }
                },
                error: function (request, error) {
                    console.error(error.responseText)
                }
            })
        }

    })
})



function verifyLogin() {
    var noErrors = true;


    if (!isValidEmailAddress($("#loginEmail").val())) {
        $("#loginEmail").addClass("error");
        $("#userEmailLoginError").text("Please enter a valid email address");
        $("#userEmailLoginError").show();
        noErrors = false;
    } else {
        $("#loginEmail").removeClass("error");
        $("#userEmailLoginError").text("");
        $("#userEmailLoginError").hide();
    }
    if ($("#loginPwd").val() == null || $("#loginPwd").val() == "") {
        $("#loginPwd").addClass("error");
        $("#passWordLoginError").text("Please enter a value!");
        $("#passWordLoginError").show();
        noErrors = false;
    } else {
        $("#loginPwd").removeClass("error");
        $("#passWordLoginError").text("");
        $("#passWordLoginError").hide();
    }
    return noErrors;

}

function isValidEmailAddress(emailAddress) {
    var pattern = /^([a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+(\.[a-z\d!#$%&'*+\-\/=?^_`{|}~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]+)*|"((([ \t]*\r\n)?[ \t]+)?([\x01-\x08\x0b\x0c\x0e-\x1f\x7f\x21\x23-\x5b\x5d-\x7e\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|\\[\x01-\x09\x0b\x0c\x0d-\x7f\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]))*(([ \t]*\r\n)?[ \t]+)?")@(([a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\d\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.)+([a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]|[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF][a-z\d\-._~\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF]*[a-z\u00A0-\uD7FF\uF900-\uFDCF\uFDF0-\uFFEF])\.?$/i;
    return pattern.test(emailAddress);
}