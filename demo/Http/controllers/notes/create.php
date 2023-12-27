<?php

if($_SESSION['user'] ?? false){
	header('Location: /');
	die();
}

$errors =[];



//require 'views/notes/create.view.php';
 view("notes/create.view.php", [ 'heading' => 'Create Note','errors' => $errors]);