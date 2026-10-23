<?php

namespace App\Models;

use PDO;
use App\Core\DB;
use ValueError;

abstract class Model {
    protected PDO $db;
    protected string $table;
    public function __construct()
    {
        $this->db=DB::getConnection();
    }

    public function getById(int $id):?array{
        $stmt=$this->db->prepare("SELECT * FROM {$this->table} WHERE id=:id");
        $stmt->execute([':id'=>$id]);
        return $stmt->fetch() ? :null;
    }

    public function create(array $data){
        $values=array_map(fn($item)=> is_string($item) ? "'$item'" : $item, array_values($data));
        $fields = implode(',', array_keys($data));
        $values=implode(',',$values);
        $sql="INSERT INTO {$this->table}({$fields}) VALUES ({$values})";
        dd($sql);
        $stmt=$this->db->prepare($sql);
        if($stmt->execute()){
            return $data;
        }else{
            return null;
        }
    }

    public function update(){
        $sql="UPDATE INTO {} VALUES";
    $stmt=$this->db->prepare($sql);
    $stmt->execute();
    }

    public function getId(int $id){
        $stmt = $this->db->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $stmt->execute([':id' => $id]);
        return $stmt->fetch() ?: null;
    }

    }
