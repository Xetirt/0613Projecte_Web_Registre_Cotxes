<?php
namespace App\Controller;

use App\Models\Car;
use App\Models\Comment;
use App\Core\Session;

class CarController extends Controller {
    private function checkAuth() {
        if (!Session::get('user_id')) {
            header('Location: /login');
            exit;
        }
    }

    public function index() {
        $carModel = new Car();
        $cars = $carModel->all();
        return $this->view('cars/index', ['cars' => $cars]);
    }

    public function show() {
        $id = $_GET['id'] ?? null;
        $carModel = new Car();
        $commentModel = new Comment();

        $car = $carModel->find($id);
        $comments = $commentModel->getByCarId($id);

        return $this->view('cars/show', ['car' => $car, 'comments' => $comments]);
    }

    public function create() {
        $this->checkAuth();
        return $this->view('cars/create');
    }

    public function store() {
        $this->checkAuth();
        $carModel = new Car();
        $carModel->create($_POST['marca'], $_POST['model'], $_POST['photo'], $_POST['year']);
        header('Location: /cars');
    }

    public function edit() {
        $this->checkAuth();
        $carModel = new Car();
        $car = $carModel->find($_GET['id']);
        return $this->view('cars/edit', ['car' => $car]);
    }

    public function update() {
        $this->checkAuth();
        $carModel = new Car();
        $carModel->update($_POST['id'], $_POST['marca'], $_POST['model'], $_POST['photo'], $_POST['year']);
        header('Location: /cars');
    }

    public function delete() {
        $this->checkAuth();
        $carModel = new Car();
        $carModel->delete($_POST['id']);
        header('Location: /cars');
    }
}