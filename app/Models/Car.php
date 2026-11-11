<?php

namespace App\Models;

use PDO;

class Car extends Model {

    public function all(): array {
        $stmt = $this->db->prepare("SELECT * FROM cars ORDER BY id DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function find(int $id) {
        $stmt = $this->db->prepare("SELECT * FROM cars WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(string $marca, string $model, string $photo, int $year): bool {
        $stmt = $this->db->prepare("INSERT INTO cars (marca, model, photo, year) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$marca, $model, $photo, $year]);
    }

    public function update(int $id, string $marca, string $model, string $photo, int $year): bool {
        $stmt = $this->db->prepare("UPDATE cars SET marca = ?, model = ?, photo = ?, year = ? WHERE id = ?");
        return $stmt->execute([$marca, $model, $photo, $year, $id]);
    }

    public function delete(int $id): bool {
        $stmt = $this->db->prepare("DELETE FROM cars WHERE id = ?");
        return $stmt->execute([$id]);
    }
}