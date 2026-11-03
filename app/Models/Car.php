<?php

namespace App\Models;

use App\Core\DB;

class Car extends Model {
    public function all(): array {
        return $this->db->query("SELECT * FROM cars ORDER BY id DESC")->fetchAll();
    }

    public function find($id) {
        $stmt = $this->db->prepare("SELECT * FROM cars WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create(string $marca, string $model, string $photo, int $year): bool {
        $stmt = $this->db->prepare("INSERT INTO cars (marca, model, photo, year) VALUES (?, ?, ?, ?)");
        return $stmt->execute([$marca, $model, $photo, $year]);
    }

    public function update($id, string $marca, string $model, string $photo, int $year): bool {
        $stmt = $this->db->prepare("UPDATE cars SET marca = ?, model = ?, photo = ?, year = ? WHERE id = ?");
        return $stmt->execute([$marca, $model, $photo, $year, $id]);
    }

    public function delete($id): bool {
        $stmt = $this->db->prepare("DELETE FROM cars WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function getAllFiltered($search = null) {
    $db = DB::getInstance();
    if ($search) {
        $stmt = $db->prepare("SELECT * FROM cars WHERE brand LIKE ? OR model LIKE ? OR plate LIKE ? ORDER BY id DESC");
        $searchTerm = "%{$search}%";
        $stmt->execute([$searchTerm, $searchTerm, $searchTerm]);
        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }
    $stmt = $db->query("SELECT * FROM cars ORDER BY id DESC");
    return $stmt->fetchAll(\PDO::FETCH_ASSOC);
}
}