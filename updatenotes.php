<?php
session_start();
include('connection.php');

//get id of note sent through Ajax
$id = $_POST['id'];
//get the content of the note
$note = $_POST['note'];
//get current time
$time = time();

//run query to update note in notes
$sql = "UPDATE notes SET note='$note', time='$time' WHERE id='$id'";
$result = mysqli_query($link, $sql);
if(!$result){
    echo 'error';
}
//show notes or alert message
?>