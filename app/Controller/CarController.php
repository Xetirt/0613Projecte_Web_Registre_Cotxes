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
        $search = $_GET['search'] ?? null;
        $cars = Car::getAllFiltered($search);
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
        $marca = $_POST['marca'] ?? '';
        $model = $_POST['model'] ?? '';
        $photo = $_POST['photo'] ?? '';
        $year = (int)($_POST['year'] ?? date('Y'));

        $carModel->create($marca, $model, $photo, $year);
        
        header('Location: /cars');
        exit();
    }

    public function edit() {
        $this->checkAuth();
        $carModel = new Car();
        $car = $carModel->find($_GET['id'] ?? null);
        return $this->view('cars/edit', ['car' => $car]);
    }

    public function update() {
        $this->checkAuth();
        $carModel = new Car();
        $carModel->update($_POST['id'], $_POST['marca'], $_POST['model'], $_POST['photo'], (int)$_POST['year']);
        header('Location: /cars');
        exit();
    }

    public function delete() {
        $this->checkAuth();
        $carModel = new Car();
        $carModel->delete($_POST['id'] ?? null);
        header('Location: /cars');
        exit();
    }
}