<?php

use Core\App;
use Core\Database;

 $config = require base_path('config.php');
$db = new Database($config['database']);

//$db = App::resolve(Database::class);

//dd($db);


   //$heading = 'Note';

   $id = $_GET['id'];

   $notes = $db->query('select * from notes where  id = :id', ['id' => $_GET['id']])->findOrFail();

   // if(!$notes){
   // 	abort();
   // }

   $currentUserId = 4;
    
    authorize($notes['user_id'] !== $currentUserId);



$errors =[];



//require 'views/notes/create.view.php';
 view("notes/edit.view.php", [ 'heading' => 'Edit Note', 'notes' => $notes,'errors' => $errors]);