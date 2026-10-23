<?php

namespace App\Models;

use App\Core\DB;
use App\Models\Model;


    class User extends Model{
        public function getId(int $id) {
            $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
            $stmt->execute([':id' => $id]);
            return $stmt->fetch() ?: null;
        }


    }