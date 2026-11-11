<?php

namespace App\Models;

use PDO;

class Comment extends Model {

    public function getByCarId(int $carId): array {
        $stmt = $this->db->prepare("
            SELECT comments.*, users.name AS author_name 
            FROM comments 
            JOIN users ON comments.user_id = users.id 
            WHERE comments.car_id = ? 
            ORDER BY comments.created_at DESC
        ");
        $stmt->execute([$carId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create(int $carId, int $userId, string $content): bool {
        $stmt = $this->db->prepare("INSERT INTO comments (car_id, user_id, content) VALUES (?, ?, ?)");
        return $stmt->execute([$carId, $userId, trim($content)]);
    }
}