<?php 
namespace App\Models;
use App\Core\Model;
use App\Core\DB;

class UserModel extends Model {
    protected $table = 'users';

    public function __construct() {
        parent::__construct();
    }

    /**
     * Create a new user with the given data
     * 
     * @param array $data Associative array containing the user data
     * @return \PDOStatement The prepared statement
     */
    public function createUser($data){
        $sql = "INSERT INTO " . $this->table . " (fullname, username, email, password, role) VALUES (:fullname, :username, :email, :password, :role)";
        $params = [
            ':fullname' => $data['fullname'],
            ':username' => $data['username'],
            ':email' => $data['email'],
            ':password' => $data['password'],
            ':role' => isset($data['role']) ? $data['role'] : 'user'
        ];
        # returns the statement
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
        
    }

    # TODO: Implement findByEmail method
    public function findByEmail($email){

        if(empty($email)){
            return null;
        }
        $sql = "SELECT * FROM " . $this->table . " WHERE email = :email";
        $params = [
            ':email' => $email
        ];
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);

        if(!$result):
            return null;
        endif;

        return DB::fetch($statement);
    }

    public function findByUsername($username){
        if(empty($username)):
            return null;
        endif;

        $sql = "SELECT * FROM " . $this->table . " WHERE username = :username";
        $params = [
            ':username' => $username
        ];
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);

        if(!$result):
            return null;
        endif;

        return DB::fetch($statement);

    }

    /**
     * Returns all users in the database as an array
     *
     * @return array<array> All users in the database
     */
    public function getAllUsers(){
        $sql = "SELECT * FROM " . $this->table;
        $statement = DB::query($sql);
        $result = oci_execute($statement);
        if(!$result):
            return [];
        endif;
        # return all users as an array
        return DB::fetchAll($statement);
          
    }    
}


?>