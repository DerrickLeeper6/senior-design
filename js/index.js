$(document).ready(function () {
    $("#create_account").click(function () {
        var data = {};

        var $email = $("#email");
        var $userPassWord1 = $("#pwd");
        // var $userPassWordVerified = $("#confirm_pwd");

        data.EMAIL = $email.val();
        data.PWD = $userPassWord1.val();

        if (verifyInputs()) {
            $.ajax({
                url: "php/verify-email-address.php",
                type: "POST",
                data: {
                    EMAIL: data.EMAIL
                },
                success: function(result) {
                    console.log(result);
                    if (result.length === 0) {
                        $.ajax({
                            url: "php/create-account.php",
                            type: "POST",
                            data: data,
                            success: function(accountResult) {
                                if(accountResult) {
                                    alert("Congratulations on signing up!");
                                    $email.val("");
                                    $userPassWord1.val("");
                                    window.location.href = "https://www.adlweddings.com/login.php";
                                }

                            },
                            error: function(request, error) {
                                console.error(error.responseText)
                            }
                        })
                    } else {
                        alert("There is an email address already associated with this account!");
                    }
                },
                error: function(reqyest, error) {
                    console.error(error.responseText);
                }

            })
        }


    })

    $("#signupClick").click(function(){
        $("#email").val("");
        $("#pwd").val("");
        $("#confirm_pwd").val("");
    })
})


function verifyInputs() {
    var noErrors = true;

    var $email = $("#email");
    


    if (!isValidEmailAddress($email.val())) {
        $("#email").addClass("error");
        $("#userEmailError").text("Email is not in the correct format")
        $("#userEmailError").show();
        noErrors = false;
    } else {
        $("#email").removeClass("error");
        $("#userEmailError").text("")
        $("#userEmailError").hide();
    }

    if ($("#pwd").val() == null || $("#pwd").val() == "") {
        $("#pwd").addClass("error");
        $("#confirm_pwd").addClass("error");
        $("#passWordMatchError").text("Passwords can not be null");
        $("#passWordMatchError").show();
        noErrors = false;
    } else {
        $("#pwd").removeClass("error");
        $("#confirm_pwd").removeClass("error");
        $("#passWordMatchError").text("")
        $("#passWordMatchError").hide();
    }

    if ($("#pwd").val() != $("#confirm_pwd").val()) {
        $("#pwd").addClass("error");
        $("#confirm_pwd").addClass("error");
        $("#passWordMatchError").text("Passwords do not match")
        $("#passWordMatchError").show();
        noErrors = false;
    } else {
        $("#pwd").removeClass("error");
        $("#confirm_pwd").removeClass("error");
        $("#passWordMatchError").text("")
        $("#passWordMatchError").hide();        
    }
    return noErrors;
}

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