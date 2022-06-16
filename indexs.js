//Ajax Call for sign up form
//Once form is submitted
$("#signupForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to signup.php using ajax
    $.ajax({
        url: "signup.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful: show error or success message
        success: function(data){
            if(data){
                $("#signupMessage").html(data);
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#signupMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});

//Ajax call for login form
//Once form is submitted
$("#loginForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to login.php using ajax
    $.ajax({
        url: "login.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful
        success: function(data){
//            if php files returns a success: redirect user to notes page
            if(data == "success"){
                window.location = "mainpageloggedin.php";
//            otherwise show error message
            }else{
                $('#loginMessage').html(data);
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#loginMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});

//Ajax call for forgot password form
//Once form is submitted
$("#passwordForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to forgotpassword.php using ajax
    $.ajax({
        url: "forgotpassword.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful
        success: function(data){
            $('#passwordMessage').html(data);
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#passwordMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});