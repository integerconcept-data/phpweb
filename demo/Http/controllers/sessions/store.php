<?php


use Core\Validator;
use Core\Database;
use Core\App;
use Http\Forms\LoginForm;
use Core\Authenticator;
use Core\Session;
use Core\ValidationException;

$db = App::resolve(Database::class);




// validate the form inputs.

	$form = LoginForm::validate($attributes = ['email' => $_POST['email'],'password' => $_POST['password']]);
	


	//return view('sessions/create.view.php',['errors' => $form->errors()]);


// check if the account already exists
 //$auth = new Authenticator();
	$signIn = (new Authenticator())->attempt($attributes['email'],$attributes['password']);
 if(!$signIn){
 	$form->error('password','No matching account found for that email address and password.')->throw();
 	
 } 

  redirect('/');
  
 	//return view('sessions/create.view.php', ['errors' => $form->errors()]);
  
  
 






//dd($user);