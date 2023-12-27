<?php

namespace Core;

use Core\Database;
use Core\App;
use Core\Session;

class Authenticator {

	public function attempt($email,$password){

		$user = App::resolve(Database::class)->query('select * from users where email = :email',['email' => $email])->find();

		if(!$user){
			return view('sessions/create.view.php', ['errors' => ['email' => 'No matching account found for that email address.']]);
		}

		if(password_verify($password, $user['password'])){
			$this->login(['email' => $email]);

			return true;
		}

		return false;
	}

	function login($user)
     {
      $_SESSION['user'] = [
         'email' => $user['email']
      ];

      session_regenerate_id(true);
     }

     function logout()
     {
        
         Session::destroy();
     }
}
