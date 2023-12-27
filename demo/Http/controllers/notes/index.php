<?php
   
   use Core\Database;
   
 $config = require base_path('config.php');
$db = new Database($config['database']);


   //$heading = 'Notes';

   $notes =$db->query('select * from notes where user_id = 4')->get();
   //dd($notes);



//require "views/notes/index.view.php";
 view("notes/index.view.php", [ 'heading' => 'Notes', 'notes' => $notes]);