<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

class DB {
    private $host = 'localhost';
    private $dbName = 'php';
    private $user = 'starbox7';
    private $password = 'starbox7';
    public $db;

    public function __construct() {
        try {
            $this->db = new PDO("pgsql:host=$this->host;dbname=$this->dbName", $this->user, $this->password, [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
            ]);
        } catch (PDOException $e) {
            die("데이터베이스 연결 실패: " . $e->getMessage());
        }
    }
}
?>
