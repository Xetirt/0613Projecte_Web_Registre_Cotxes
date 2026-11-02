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

    private function handleImageUpload($file) {
    if (!isset($file) || $file['error'] !== UPLOAD_ERR_OK) {
        return null;
    }

    $allowedTypes = ['image/jpeg', 'image/png', 'image/webp'];
    if (!in_array($file['type'], $allowedTypes)) {
        throw new \Exception("Formato de imagen no permitido. Usa JPEG, PNG o WebP.");
    }

    $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
    $filename = uniqid('car_', true) . '.' . $extension;
    $uploadDir = __DIR__ . '/../../public/uploads/cars/';

    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0755, true);
    }

    $destination = $uploadDir . $filename;
    if (move_uploaded_file($file['tmp_name'], $destination)) {
        return 'uploads/cars/' . $filename;
    }

    return null;
}
}