<?php

class DataBaseService {
    private mysqli $db;

    public function __construct() {
        $this->db = new mysqli('db', 'root', 'secret', 'web');
    }

    public function addPost(string $email, string $title, string $description, string $category) {
        $query = "
	INSERT INTO web.test (email, title, description, category)
	VALUES (?, ?, ?, ?)
	";

        $preparedStatement = mysqli_prepare($this->db, $query);
        $preparedStatement->bind_param("ssss", $email,$title, $description , $category);
        mysqli_stmt_execute($preparedStatement);
    }

    public function getPosts(): array {
        $items = [];
        $query = "
		SELECT email, title, description, category FROM web.test;
	";
        $resultQuery = $this->db->query($query);

        foreach ($resultQuery as $row) {
            $items[] = $this->buildTask($row);
        }

        return $items;
    }

    private function buildTask(array $taskData): array {
        return [
            $taskData['title'],
            $taskData['email'],
            $taskData['description'],
            $taskData['category']
        ];
    }
}