// Ajax call to update username
//Once form is submitted
$("#updateUsernameForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to signup.php using ajax
    $.ajax({
        url: "updateusername.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful: show error or success message
        success: function(data){
            if(data){
                $("#updateUsernameMessage").html(data);
            }else{
                location.reload();
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#updateUsernameMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});

// Ajax call to update email
//Once form is submitted
$("#updateEmailForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to signup.php using ajax
    $.ajax({
        url: "updateemail.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful: show error or success message
        success: function(data){
            if(data){
                $("#updateEmailMessage").html(data);
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#updateEmailMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});

// Ajax call to update password
//Once form is submitted
$("#updatePasswordForm").submit(function(event){
//    prevent default php processing
    event.preventDefault();
//    collect user inputs
    var datatopost = $(this).serializeArray();
//    send them to signup.php using ajax
    $.ajax({
        url: "updatepassword.php",
        type: "POST",
        data: datatopost,
//        Ajax call successful: show error or success message
        success: function(data){
            if(data){
                $("#updatePasswordMessage").html(data);
            }
        },
//        Ajax Call fails: show ajax call error
        error: function(){
            $("#updatePasswordMessage").html("<div class='alert alert-danger'>There was an error with the Ajax call. Please try again</div>");
        }
    });
});