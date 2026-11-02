<?php

namespace App\Models;

use App\Core\DB;
use PDO;

abstract class Model {
    protected PDO $db;

    public function __construct() {
        $this->db = DB::getInstance();
    }
}