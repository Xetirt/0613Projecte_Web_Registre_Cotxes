<?php
namespace App\Models;

class Car extends Model {
    public function all() {
        return $this->db->query("SELECT * FROM cars ORDER BY id DESC")->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM cars WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($marca, $model, $photo, $year) {
        $stmt = $this->db->prepare("INSERT INTO cars (marca, model, photo, year) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$marca, $model, $photo, $year]);
    }

    public function update($id, $marca, $model, $photo, $year) {
        $stmt = $this->db->prepare("UPDATE cars SET marca = ?, model = ?, photo = ?, year = ? WHERE id = ?");
        return $stmt->execute([$marca, $model, $photo, $year, $id]);
    }

    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM cars WHERE id = ?");
        return $stmt->execute([$id]);
    }
}