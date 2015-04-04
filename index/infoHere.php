<?php
var_dump($_POST);

$return = mail();

$message = "Test: \n" . $_POST['firstname'] . " " . $_POST['firstname'] ;
?>

