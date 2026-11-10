<?php

namespace App\Controller;

use App\Models\Comment;
use App\Core\Session;

class CommentController extends Controller {

    public function store() {
        if (!Session::isLoggedIn()) {
            die("Debes iniciar sesión para comentar.");
        }

        $carId = (int)($_POST['car_id'] ?? 0);
        $content = $_POST['content'] ?? '';
        $userId = Session::get('user_id');

        if ($carId > 0 && !empty($content)) {
            $commentModel = new Comment();
            $commentModel->create($carId, $userId, $content);
        }

        header("Location: /cars/show?id=" . $carId);
        exit;
    }
}