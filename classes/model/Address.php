<?php

class Address extends DB {

    private $db;

    public function __construct()
    {
        $this->db = DB::get();
    }

    public static function all() {
        $sql = "SELECT * FROM addresses;";
        $stmt = DB::get()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function allWithCityName() {
        $sql = "SELECT addresses.*, cities.city_name FROM addresses 
                    LEFT JOIN cities ON addresses.city_id = cities.id;";
        $stmt = DB::get()->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
    
    public static function getById($id) {
        $sql = "SELECT * FROM addresses WHERE id = ?;";
        $stmt = DB::get()->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function create($data) {
        $sql = 'INSERT INTO addresses (first_name, last_name, email, street, zip_code, city_id) VALUES (:first_name, :last_name, :email, :street, :zip_code, :city_id)';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':street', $data['street']);
        $stmt->bindParam(':zip_code', $data['zip_code']);
        $stmt->bindParam(':city_id', $data['city_id']);
        return $stmt->execute();
    }

    public function update($data) {
        $sql = 'UPDATE addresses SET first_name=:first_name, last_name=:last_name, email=:email, street=:street, zip_code=:zip_code, city_id=:city_id WHERE id=:id';
        $stmt = $this->db->prepare($sql);
        $stmt->bindParam(':id', $data['id']);
        $stmt->bindParam(':first_name', $data['first_name']);
        $stmt->bindParam(':last_name', $data['last_name']);
        $stmt->bindParam(':email', $data['email']);
        $stmt->bindParam(':street', $data['street']);
        $stmt->bindParam(':zip_code', $data['zip_code']);
        $stmt->bindParam(':city_id', $data['city_id']);
        return $stmt->execute();
    }
    
}