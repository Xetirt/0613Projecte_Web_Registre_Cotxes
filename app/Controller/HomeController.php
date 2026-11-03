<?php

namespace App\Controller;

use App\Models\User;

class HomeController extends Controller {

    public function contact() {
        return $this->view('pages.contact', [
            'title' => 'Contacto'
        ]);
    }

    public function index() {
        // Obtenemos los datos de un usuario (o null si no hay sesión/usuario)
        $userModel = new User();
        $user = $userModel->findByEmail('xavi@gmail.com'); // O busca el usuario que prefieras mostrar

        return $this->view('pages.home', [
            'title' => 'Página Principal',
            'user'  => $user
        ]);
    }
}