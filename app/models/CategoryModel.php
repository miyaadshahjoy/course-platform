<?php 
namespace App\Models;
use App\Core\Model;
use App\Core\DB;

class CategoryModel extends Model {
    protected $table = 'course_categories';
    public function __construct() {
        parent :: __construct();
    }

    public function createCategory($data){

        $sql = "INSERT INTO " . $this->table . " (category_name) VALUES (:category_name)";

        $params = [
            ':category_name' => $data['category_name']
        ];

        # returns the statement
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
    }

    public function getAllCategories(){
        $sql = "SELECT * FROM " . $this->table;
        $statement = DB::query($sql);
        $result = oci_execute($statement);

        if(!$result):
            return [];
        endif;
        # return all categories as an array
        return DB::fetchAll($statement);
    }

}