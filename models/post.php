<?php
require_once 'DB.php';

class PostModel {
    private $conn;

    public function __construct() {
        $database = new DB();
        $this->conn = $database->getConnection();
    }

    // 게시글 추가
    public function addPost($title, $author, $date, $content, $password) {
        $query = "INSERT INTO posts (title, author, date, content, password) VALUES (?, ?, ?, ?, ?)";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$title, $author, $date, $content, $password]);

        return $stmt->rowCount();
    }

    // 게시글 수정
    public function updatePost($id, $title, $author, $date, $content, $password) {
        $query = "UPDATE posts SET title = ?, author = ?, date = ?, content = ?, password = ? WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$title, $author, $date, $content, $password, $id]);

        return $stmt->rowCount();
    }

    // 게시글 삭제
    public function deletePost($id) {
        $query = "DELETE FROM posts WHERE id = ?";

        $stmt = $this->conn->prepare($query);
        $stmt->execute([$id]);

        return $stmt->rowCount();
    }
}
?>
