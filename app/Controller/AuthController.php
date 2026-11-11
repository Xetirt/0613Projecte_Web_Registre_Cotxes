<?php

namespace App\Controller;

use App\Models\User;
use App\Core\Session;

class AuthController extends Controller {

    public function showLogin() {
        return $this->view('auth/login');
    }

    public function showRegister() {
        return $this->view('auth/register');
    }

    public function logout() {
    Session::destroy();
    header('Location: /');
    exit;
}

    public function register() {
        $email = $_POST['email'] ?? '';
        $userModel = new User();

        // 1. Comprobar si existe el email mediante la instancia $userModel
        if ($userModel->findByEmail($email)) {
            die("El usuario o email '{$email}' ya está registrado.");
        }

        try {
            // 2. Crear usuario usando la instancia
            $userModel->create($_POST);
            header('Location: /login');
            exit;
        } catch (\PDOException $e) {
            if ($e->getCode() == 23000) {
                die("Error: El correo electrónico ya está en uso.");
            }
            die("Error al registrar usuario: " . $e->getMessage());
        }
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        // Dentro del método login() en AuthController.php:
if ($user && password_verify($password, $user['password'])) {
    Session::set('user_id', $user['id']);
    Session::set('user_name', $user['name'] ?? $user['email']);
    Session::set('user_email', $user['email']);
    Session::set('user_role', $user['role'] ?? 'user'); // Guardar rol

    header('Location: /');
    exit;
}

        die("Credenciales incorrectas.");
    }
}