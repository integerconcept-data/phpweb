<?php
use Core\Response;
use Core\Router;

 function dd($value){
     	echo "<pre>";
     	var_dump($value);
     	echo "</pre>";

     	die();
     }

     function urlIs($value){
     	return $_SERVER['REQUEST_URI'] === $value;
     }

     function authorize($condition, $status = Response::FORBIDDEN){
        if(! $condition){
            abort($status);
        }
     }

     function base_path($path){

        return BASE_PATH . $path;
     }

     function view($path, $attributes = []){

        extract($attributes);

        require base_path('views/' . $path);
     }

     function redirect($path)
     {
       header("Location: {$path}");
         die();
     }

     

     function old($key, $default='')
     {
        return \Core\Session::get('old')[$key] ?? $default ;
     }