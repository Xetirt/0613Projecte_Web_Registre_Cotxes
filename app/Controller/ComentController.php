<?php

namespace App\Controller;

use App\Models\Comment;
use App\Core\Session;

class CommentController extends Controller {
    public function store() {
        if (!Session::get('user_id')) {
            header('Location: /login');
            exit;
        }

        $description = $_POST['description'] ?? '';
        $car_id = $_POST['car_id'] ?? null;
        $user_id = Session::get('user_id');

        if (!empty($description) && $car_id) {
            $commentModel = new Comment();
            $commentModel->create($description, $car_id, $user_id);
        }

        header("Location: /cars/show?id=" . $car_id);
        exit;
    }
}