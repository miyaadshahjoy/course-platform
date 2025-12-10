<?php
namespace App\Core;

class Model {
    # Database connection instance
    protected $db;

    public function __construct() {
        $this->db = DB::connect();
    }
}

?>