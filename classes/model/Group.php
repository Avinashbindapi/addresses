<?php

class Group extends DB {

    private $db;

    public function __construct()
    {
        $this->db = DB::get();
    }

    public static function getByParentId($parent = 0) {
        $sql = "SELECT * FROM groups WHERE parent_id = ?;";
        $stmt = DB::get()->prepare($sql);
        $stmt->execute([$parent]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getById($id) {
        $sql = "SELECT * FROM groups WHERE id = ?;";
        $stmt = DB::get()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = 'INSERT INTO groups (id, parent_id, name, created_at) VALUES (:id, :parent_id, :name, :created_at)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':parent_id', $data['parent_id'], PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $data['created_at'], PDO::PARAM_STR);
        return $stmt->execute();
    }
    
    public function updateGroup($data) {
        $sql = 'UPDATE groups SET parent_id=:parent_id, name=:name, created_at=:created_at WHERE id=:id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $stmt->bindParam(':parent_id', $data['parent_id'], PDO::PARAM_INT);
        $stmt->bindParam(':name', $data['name'], PDO::PARAM_STR);
        $stmt->bindParam(':created_at', $data['created_at'], PDO::PARAM_STR);
        return $stmt->execute();
    }
    
}