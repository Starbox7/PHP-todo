<?php
error_reporting( E_ALL );
ini_set( "display_errors", 1 );

require_once __DIR__ . '/../services/db.php';

class PostModel {
    private $db;

    public function __construct() {
        $database = new DB();
        $this->db = $database->getConnection();
    }

    // 게시글 추가
    public function addPost($title, $author, $date, $content, $password) {
        $query = "INSERT INTO posts (title, author, date, content, password) VALUES (:title, :author, :date, :content, :password)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':title' => $title,
            ':author' => $author,
            ':date' => $date,
            ':content' => $content,
            ':password' => $password
        ]);
    }

    // 게시글 읽기 (단일 게시글)
    public function getPost($id) {
        $query = "SELECT * FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->execute([':id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // 게시글 수정
    public function updatePost($id, $title, $author, $date, $content, $password) {
        $query = "UPDATE posts SET title = :title, author = :author, date = :date, content = :content, password = :password WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            ':id' => $id,
            ':title' => $title,
            ':author' => $author,
            ':date' => $date,
            ':content' => $content,
            ':password' => $password
        ]);
    }

    // 게시글 삭제
    public function deletePost($id) {
        $query = "DELETE FROM posts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([':id' => $id]);
    }

    // 모든 게시글 읽기
    public function getAllPosts() {
        $query = "SELECT * FROM posts";
        $stmt = $this->db->prepare($query);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
