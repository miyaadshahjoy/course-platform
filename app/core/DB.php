<?php
namespace App\Core;
use Exception;

class DB {
    private static $conn = null;

    public static function connect() {
        if (self::$conn === null) {
            $username = $_ENV['DB_USERNAME'];
            $password = $_ENV['DB_PASSWORD'];
            $connectionString = 'localhost/XEPDB1'; 
            // Change this to your PDB

            self::$conn = oci_connect(
                $username,
                $password,
                $connectionString,
                'AL32UTF8' // charset
            );

            if (!self::$conn) {
                $error = oci_error();
                throw new Exception("Oracle connection failed: " . $error['message']);
            }
        }

        return self::$conn;
    }

    public static function query($sql, $params = []) { # $params - associative array of bind variables and their values
        $conn = self::connect();

        $statement = oci_parse($conn, $sql);

        # Bind parameters
        foreach ($params as $key => $value) {
            
            oci_bind_by_name($statement, $key, $params[$key]);
        }

        return $statement;
    }

    public static function fetchAll($statement) {
        oci_fetch_all($statement, $rows, 0, -1, OCI_FETCHSTATEMENT_BY_ROW);

        /* while ($row = oci_fetch_assoc($statement)) {
            $rows[] = $row;
        } */
        return $rows;
    }

    public static function fetch($statement) {
        return oci_fetch_assoc($statement);
    }
}

?>