<?php
namespace App\Controller;
use App\Core\DB;
use PDOException;
use App\Models\User;

class HomeController{
    function contact(){
        return view('contact',['title'=>'Contact']);
    }

    function index() {
    $user = new User;
    try {
        $res = $user->create([
            'name' => 'Carlitos',
            'email' => 'carlitos@gmail.com',
            'password' => '1234',
        ]);
    } catch (PDOException $e) {
        die($e->getMessage());
    }

    return view('home', [
        'title' => 'Página Principal',
        'user' => $res
    ]);
}
}