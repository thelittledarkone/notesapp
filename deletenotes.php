<?php
session_start();
include('connection.php');

//get id of note sent through Ajax
$note_id = $_POST['id'];

//run query to delete note from notes
$sql = "DELETE FROM notes WHERE id='$note_id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
    exit;
}
//show notes or alert message
?>