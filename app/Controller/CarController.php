<?php

namespace App\Controller;

use App\Models\Car;
use App\Models\Comment;
use App\Core\Session;

class CarController extends Controller {

    public function index() {
        $carModel = new Car();
        $cars = $carModel->all();
        return $this->view('cars.index', ['cars' => $cars]);
    }

    public function show() {
        $id = (int)($_GET['id'] ?? 0);
        $carModel = new Car();
        $car = $carModel->find($id);

        if (!$car) {
            die("El coche solicitado no existe.");
        }

        $commentModel = new Comment();
        $comments = $commentModel->getByCarId($id);

        return $this->view('cars.show', [
            'car' => $car,
            'comments' => $comments
        ]);
    }

    public function create() {
        if (!Session::isAdmin()) {
            die("Acceso denegado. Solo los administradores pueden añadir vehículos.");
        }
        return $this->view('cars.create');
    }

    public function store() {
        if (!Session::isAdmin()) {
            die("Acceso denegado.");
        }
        
        $carModel = new Car();
        $carModel->create(
            $_POST['marca'] ?? '',
            $_POST['model'] ?? '',
            $_POST['photo'] ?? '',
            (int)($_POST['year'] ?? date('Y'))
        );

        header('Location: /cars');
        exit;
    }

    public function destroy() {
        if (!Session::isAdmin()) {
            die("Acceso denegado.");
        }

        $id = (int)($_POST['id'] ?? 0);
        $carModel = new Car();
        $carModel->delete($id);

        header('Location: /cars');
        exit;
    }
}