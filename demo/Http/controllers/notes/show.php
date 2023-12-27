<?php
use Core\Database;

 $config = require base_path('config.php');
$db = new Database($config['database']);


   //$heading = 'Note';

   $id = $_GET['id'];

   $notes = $db->query('select * from notes where  id = :id', ['id' => $id])->findOrFail();

   // if(!$notes){
   // 	abort();
   // }

   $currentUserId = 4;
    
    authorize($notes['user_id'] !== $currentUserId);
   

   //require "views/notes/show.view.php";
   view("notes/show.view.php", [ 'heading' => 'Note', 'notes' => $notes]);