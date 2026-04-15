<?php
namespace App\Models;

use PDO;

class UserModel {
    private $conn;

    public function __construct($database) {
        $this->conn = $database->getConnection();
    }

    public function selectAll() {
        $sql = "SELECT * FROM account ORDER BY id DESC";
        $result = $this->conn->query($sql);
        $users = [];

        if ($result->rowCount() > 0) {
            while($row = $result->fetch()) {
                $users[] = $row;
            }
        }
        
        return $users;
    }

    public function getUser($id) {
        $sql = "SELECT * FROM account WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function getUserByUsername($username) {
        $sql = "SELECT * FROM account WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);
        return $stmt->fetch();
    }

    public function updateUser($data) {
        $sql = "UPDATE account SET username = ?, email = ? WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([
            $data['username'],
            $data['email'],
            $data['id']
        ]);
    }

    public function insert($data) {
        try{
            $sql = "INSERT INTO account (username, password, email) VALUES (:username, :password, :email)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':username',$data['username'], PDO::PARAM_STR);
            $stmt->bindParam(':password',$data['password'], PDO::PARAM_STR);
            $stmt->bindParam(':email',$data['email'], PDO::PARAM_STR);
            if ($stmt->execute()) {
                return true;
            }
            return false;
        } catch(\PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function deleteUser($id) {
        $sql = "DELETE FROM account WHERE id = ?";
        $stmt = $this->conn->prepare($sql);
        return $stmt->execute([$id]);
    }

   public function checkUsernameAvailability($username) {
        $sql = "SELECT id FROM account WHERE username = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$username]);

        return $stmt->rowCount() === 0;
    }
    public function checkEmailAvailability($email) {
        $sql = "SELECT id FROM account WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([$email]);

        return $stmt->rowCount() === 0;
    }
}
?>