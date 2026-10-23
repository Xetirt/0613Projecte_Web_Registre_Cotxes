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

    public function register() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        if (!empty($email) && !empty($password)) {
            $userModel = new User();
            $userModel->create($email, $password);
            header('Location: /login');
            exit;
        }
        header('Location: /register');
    }

    public function login() {
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $userModel = new User();
        $user = $userModel->findByEmail($email);

        if ($user && password_verify($password, $user['password'])) {
            Session::set('user_id', $user['id']);
            Session::set('user_email', $user['email']);
            header('Location: /cars');
            exit;
        }

        header('Location: /login');
    }

    public function logout() {
        Session::destroy();
        header('Location: /login');
    }
}