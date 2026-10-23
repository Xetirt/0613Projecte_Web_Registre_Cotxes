<?php
namespace App\Models;

class Comment extends Model {
    public function getByCarId($car_id) {
        $stmt = $this->db->prepare("
            SELECT comments.*, users.email 
            FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE car_id = ? 
            ORDER BY comments.id DESC
        ");
        $stmt->execute([$car_id]);
        return $stmt->fetchAll();
    }

    public function create($description, $car_id, $user_id) {
        $stmt = $this->db->prepare("INSERT INTO comments (description, car_id, user_id) VALUES (?, ?, ?)");
        return $stmt->execute([$description, $car_id, $user_id]);
    }
}