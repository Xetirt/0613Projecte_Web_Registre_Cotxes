<?php

namespace App\Models;

use PDO;

class User extends Model {

    public function findByEmail(string $email) {
        $stmt = $this->db->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create(array $data): bool {
        $stmt = $this->db->prepare("INSERT INTO users (name, email, password) VALUES (?, ?, ?)");
        $hashedPassword = password_hash($data['password'], PASSWORD_BCRYPT);

        return $stmt->execute([
            $data['name'] ?? '',
            $data['email'] ?? '',
            $hashedPassword
        ]);
    }
}