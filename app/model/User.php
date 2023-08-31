<?php
include '../config/main.php';
class UserModel
{
    private $pdo;

    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function getUsers()
    {
        $query = "SELECT * FROM users";
        $statement = $this->pdo->query($query);
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $users;
    }

    public function createUser($name, $email)
    {
        $query = "INSERT INTO users (name, email) VALUES (:name, :email)";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        $statement->execute();
        return $this->pdo->lastInsertId();
    }

    public function getUserById($userId)
    {
        $query = "SELECT * FROM users WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $userId);
        $statement->execute();
        return $statement->fetch(PDO::FETCH_ASSOC);
    }

    public function updateUser($userId, $name, $email)
    {
        $query = "UPDATE users SET name = :name, email = :email WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $userId);
        $statement->bindParam(':name', $name);
        $statement->bindParam(':email', $email);
        return $statement->execute();
    }

    public function deleteUser($userId)
    {
        $query = "DELETE FROM users WHERE id = :id";
        $statement = $this->pdo->prepare($query);
        $statement->bindParam(':id', $userId);
        return $statement->execute();
    }
}
?>
