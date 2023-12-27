<?php
use Core\App;
use Core\Database;

//  $config = require base_path('config.php');
// $db = new Database($config['database']);

$db = App::resolve(Database::class);

//dd($db);


   //$heading = 'Note';

   $id = $_GET['id'];

   $notes = $db->query('select * from notes where  id = :id', ['id' => $_POST['id']])->findOrFail();

   // if(!$notes){
   // 	abort();
   // }

   $currentUserId = 4;
    
    authorize($notes['user_id'] !== $currentUserId);

    $db->query('delete from notes where id = :id', ['id' => $_POST['id']]);

    header('location: /notes');

    exit();
   

   //require "views/notes/show.view.php";
   //view("notes/show.view.php", [ 'heading' => 'Note', 'notes' => $notes]);