<?php

namespace App\Controller;

use App\Models\User;

class HomeController extends Controller {

    public function index() {
        $userModel = new User();
        $user = $userModel->findByEmail('xavi@gmail.com');

        return $this->view('home', [
            'title' => 'Página Principal',
            'user'  => $user ?: null
        ]);
    }

    public function contact() {
        return $this->view('pages.contact', [
            'title' => 'Contacto'
        ]);
    }
}