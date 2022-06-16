<?php
session_start();
if(!isset($_SESSION['user_id'])){
    header("location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Notes</title>
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
                        <li><a href="profile.php">Profile</a></li>
                        <li><a href="#">Help</a></li>
                        <li><a href="#">Contact</a></li>
                        <li class="active"><a href="mainpageloggedin.php">My Notes</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="#">Logged In as <b><?php echo $_SESSION['username']?></b></a></li>
                        <li><a href="index.php?logout=1">Logout</a></li>
                    </ul>
                </div>
            </div>
        </nav>
<!--        Main Content-->
        <div class="container" id="notesContainer">
<!--            Collapsable div for error messages-->
            <div id="alert" class="alert alert-danger collapse">
                <a class="close" data-dismiss="alert">&times;</a>
                <p id="alertContent"></p>
            </div>
            <div class="row">
                <div class="col-md-offset-3 col-md-6">
                    <div class="buttons">
                        <button type="button" id="addNote" class="btn btn-lg btnColor">Add Note</button>
                        <button type="button" id="edit" class="btn btn-lg btnColor pull-right">Edit</button>
                        <button type="button" id="done" class="btn btn-lg btnDone pull-right">Done</button>
                        <button type="button" id="allNotes" class="btn btn-lg btnColor">All Notes</button>
                    </div>
                    <div id="notePad">
                        <textarea rows="10"></textarea>
                    </div>
                    <div id="notes" class="notes">
<!--                    Use Ajax to call a php file that retrieves the notes from                       database-->
                        
                    </div>
                </div>
            </div>
        </div>

<!--        Footer-->
        <div class="footer">
            <div class="container-fluid">
                <p id="brand">Seraphim Virtual Services,<br /> Copyright &copy; <?php $today = date("Y"); echo $today?></p>
                <p id="credits"><a href="credits.html">Credits</a></p>
            </div>
        
        </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        
        <script src="boot/bootstrap.min.js"></script>
        
        <script src="mynotes.js"></script>    
    </body>
</html>