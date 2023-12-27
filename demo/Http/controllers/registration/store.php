<?php


use Core\Validator;
use Core\Database;
use Core\App;


$email = $_POST['email'];
$password = $_POST['password'];

// validate the form inputs.
$errors =[];

if(!Validator::email($email)){
	$errors['email'] = 'Please provide a valid email address.';
}

if(!Validator::string($password,6 , 255)){
	$errors['password'] = 'Please provide a password of at least seven character.';
}

if(! empty($errors)){
	return view('registration/create.view.php', ['errors' => $errors]);
}

$db = App::resolve(Database::class);
// check if the account already exists

$user = $db->query('select * from users where email = :email',['email' => $email])->find();

if($user){

	header('Location: /');
} else {
	// if not, save one to the database, and then log the user in , and redirect.

	$db->query('INSERT INTO users(email, password) VALUES(:email, :password)',['email' => $email, 'password' => password_hash($password, PASSWORD_BCRYPT)]);
}

//mark that the user has logged in.

login($user);

header('Location: /');
die();