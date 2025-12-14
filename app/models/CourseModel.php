<?php 
namespace App\Models;
use App\Core\Model;
use App\Core\DB;

class CourseModel extends Model {
    protected $table = 'courses';

    public function __construct() {
        parent :: __construct();
    }

    public function createCourse($data) {
        $sql = "INSERT INTO " . $this->table . " (course_title, course_description, thumbnail, category, price, slug, difficulty_level, duration) VALUES (:course_title, :course_description, :thumbnail, :category, :price, :slug, :difficulty_level, :duration)";

        $params = [
            ':course_title' => $data['course_title'],
            ':course_description' => $data['course_description'],
            ':thumbnail' => $data['thumbnail'],
            ':category' => $data['category'],
            ':price' => $data['price'],
            ':slug' => $data['slug'],
            ':difficulty_level' => $data['difficulty_level'],
            ':duration' => $data['duration'],
        ];

        # returns the statement
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
    }

    public function getAllCourses(){
        $sql = "SELECT * FROM " . $this->table . " WHERE status != 'archived'";
        $statement = DB::query($sql);
        $result = oci_execute($statement);

        if(!$result):
            return [];
        endif;
        # return all courses as an array
        return DB::fetchAll($statement);
    }

    # Find a course by ID
    public function getCourseById($id){
        if(!$id):
            return null;
        endif;

        $sql = "SELECT * FROM " . $this->table . " WHERE id = :id";
        $params = [':id' => $id];
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);

        if(!$result):
            return null;
        endif;

        return DB::fetch($statement);

    }

    # Update a course
    public function updateCourse($id, $data) {
        if(!$id) return false;

        $sql = "UPDATE " . $this->table . 
               " SET course_title = :course_title,
               course_description = :course_description,
               thumbnail = :thumbnail,
               category = :category,
               price = :price,
               slug = :slug,
               difficulty_level = :difficulty_level,
               duration = :duration
               WHERE id = :id";
        $params = [
            ':course_title' => $data['course_title'] ,
            ':course_description' => $data['course_description'] ,
            ':thumbnail' => $data['thumbnail'] ,
            ':category' => $data['category'] ,
            ':price' => $data['price'] ,
            ':slug' => $data['slug'] ,
            ':difficulty_level' => $data['difficulty_level'] ,
            ':duration' => $data['duration'] ,
            ':id' => $id
        ];

        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
    }

    # Delete a course
    public function deleteCourse($id) {
        if(!$id) return false;

        $sql = "DELETE FROM " . $this->table . " WHERE id = :id";
        $params = [':id' => $id];
        
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
    }

    # Publish course
    public function publish($id){
        if(!$id) return false;

        $sql = "UPDATE " . $this->table . 
        " SET status = 'published' WHERE id = :id";
        $params = [':id' => $id];
        
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
    }
    # Draft course
    public function draft($id){
        if(!$id) return false;

        $sql = "UPDATE " . $this->table . 
        " SET status = 'draft' WHERE id = :id";
        $params = [':id' => $id];
        
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
    }
    # Archive course
    public function archive($id){
        if(!$id) return false;

        $sql = "UPDATE " . $this->table . 
        " SET status = 'archived' WHERE id = :id";
        $params = [':id' => $id];
        
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);
        return $result;
    }

    # Get total number of courses
    public function getTotalCourses() {
        $sql = "SELECT COUNT(*) AS total FROM " . $this->table . " WHERE status != 'archived'";
        $statement = DB::query($sql);
        $result = oci_execute($statement);

        if(!$result):
            return 0;
        endif;
        $result = DB::fetch($statement)['TOTAL'];
        return $result;
    }

    # Get course count by status
    public function getCourseCountByStatus($status) {

        if(!in_array($status, ['published', 'draft'])):
            echo "Invalid status: " . $status;
            exit;
        endif;

        $sql = "SELECT COUNT(*) AS count FROM " . $this->table . " WHERE status = :status";
        $params = [':status' => $status];
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);

        if(!$result):
            return 0;
        endif;

        $result = DB::fetch($statement)['COUNT'];
        return $result;
    }

    # Get course count by categories
    public function getCourseCountByCategories() {

        $sql = "SELECT category, COUNT(*) AS count FROM " . $this->table . " GROUP BY category";
        $statement = DB::query($sql);
        $result = oci_execute($statement);

        if(!$result):
            return [];
        endif;

        # return all courses as an array
        // FIXME:
        return DB::fetchAll($statement);
    }

    public function getCourseBySlug($slug){
        if(!$slug):
            return null;
        endif;

        $sql = "SELECT * FROM " . $this->table . " WHERE slug = :slug";
        $params = [':slug' => $slug];
        $statement = DB::query($sql, $params);
        $result = oci_execute($statement);

        if(!$result):
            return null;
        endif;

        return DB::fetch($statement);
    }

}

