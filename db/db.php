<?php
class Database {
    private $con;
    private static $instance;
    private function __construct(){
        $this->connect();
    }

    public static function getConnection() {
        if (empty(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance->con;
    }

    private function connect() {
        try {
            $this->con = new PDO('mysql:/host=' . host . ';dbname=' . db_name, username, password );
            $this->con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    private function __clone()
    {
        throw new Exception();
    }
}