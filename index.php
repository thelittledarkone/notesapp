<?php
session_start();
include('connection.php');

//logout
include('logout.php');
//remember me
include('rememberme.php');
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Notes App Home</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=yes">
        <meta name="description" content="#">
        <link rel="icon" href="#">
        <!-- Bootstrap & Fonts CSS -->
        <link rel="stylesheet" href="boot/bootstrap.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Akaya+Telivigala&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Rubik&display=swap" rel="stylesheet">
<!--        Custom Styling-->
        <link rel="stylesheet" href="css/style.css">
    </head>
    <body>
<!--        Navigation-->
        <nav role="navigation" class="navbar navbar-custom navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand">Online Notes App</a>
                    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                        <span class="sr-only"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="#">Home</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#loginModal" data-toggle="modal">Login</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<!--        Main Content-->
        <div class="jumbotron" id="myContainer">
            <h1>Online Notes App</h1>
            <p>Your notes, with you wherever you go!</p>
            <p>Easy to use, protection for your notes!</p>
            <button type="button" class="btn btn-lg btnColor btnSignup" data-target="#signupModal" data-toggle="modal">Sign Up For Free</button>
        </div>
<!--        Login-->
        <form method="post" id="loginForm">
            <div class="modal" id="loginModal" role="dialog" aria-labelledby="loginModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Login:</h4>
                        </div>
                        <div class="modal-body">
<!--                            login message for php file-->
                            <div id="loginMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="loginemail" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="loginemail" name="loginemail" placeholder="Email" maxlength="50">
                                <label for="loginpassword" class="sr-only">Password</label>
                                <input class="form-control" type="password" id="loginpassword" name="loginpassword" placeholder="Password" maxlength="30">        
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="rememberme" id="rememberme">
                                    Remember Me
                                </label>
                                <a class="pull-right" style="cursor: pointer" data-dismiss="modal" data-target="#passwordModal" data-toggle="modal">Forgot Password?</a>
                            </div>                            
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="login" type="submit" value="Login">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
<!--        Sign Up-->
        <form method="post" id="signupForm">
            <div class="modal" id="signupModal" role="dialog" aria-labelledby="signupModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Sign Up today and Start using our Online Notes App</h4>
                        </div>
                        <div class="modal-body">
<!--                            Signup message for php file-->
                            <div id="signupMessage"></div>
<!--                            Sign up form-->
                            <div class="form-group">
                                <label for="username" class="sr-only">Username</label>
                                <input class="form-control" type="text" id="username" name="username" placeholder="Username" maxlength="30">
                                <label for="email" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="email" name="email" placeholder="Email" maxlength="50">
                                <label for="password" class="sr-only">Choose a Password</label>
                                <input class="form-control" type="password" id="password" name="password" placeholder="Choose a Password" maxlength="30">
                                <label for="password2" class="sr-only">Confirm Password</label>
                                <input class="form-control" type="password" id="password2" name="password2" placeholder="Confirm Password" maxlength="30">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="signup" type="submit" value="Sign Up">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
<!--        Forgot password form-->
        <form method="post" id="passwordForm">
            <div class="modal" id="passwordModal" role="dialog" aria-labelledby="passwordModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">&times;</a>
                            <h4 id="myModalLabel">Enter your email address below to recover your account and set a new password:</h4>
                        </div>
                        <div class="modal-body">
<!--                            forgot password message for php file-->
                            <div id="passwordMessage"></div>
<!--                            Forgot Password form-->
                            <div class="form-group">
                                <label for="passwordemail" class="sr-only">Email</label>
                                <input class="form-control" type="email" id="passwordemail" name="passwordemail" placeholder="Email" maxlength="50">  
                            </div>                       
                        </div>
                        <div class="modal-footer">
                            <input class="btn btnColor" name="forgotpassword" type="submit" value="Submit">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-default pull-left" data-dismiss="modal" data-target="#signupModal" data-toggle="modal">Register</button>
                        </div>
                    </div>
                </div>
            </div>        
        </form>
<!--        Footer-->
        <div class="footer">
            <div class="container-fluid">
                <p id="brand">Seraphim Virtual Services,<br /> Copyright &copy; <?php $today = date("Y"); echo $today?></p>
                <p id="credits"><a href="credits.html">Credits</a></p>
            </div>
        
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <!--Include all compiled plugins (below), or include individual files as needed -->
        <script src="boot/bootstrap.min.js"></script>
        <script src="indexs.js"></script>
    </body>