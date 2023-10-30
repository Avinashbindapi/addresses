    <?php

    class City {

        private $db;

        public function __construct()
        {
            $this->db = DB::get();
        }

        public static function all() {
            $query = "SELECT * FROM cities;";
            $stmt = DB::get()->prepare($query);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function create($data) {
            $query = 'INSERT INTO entries SET name=:name, first_name=:first_name, email=:email, street=:street, zip_code=:zip_code, city_id=:city_id';
            $stmt = $this->db->prepare($query);
        }
        
    }