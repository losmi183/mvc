<?php

class m0001_initial {
    public function up() {
        $db = \app\core\Application::$app->db;
        $sql = "CREATE TABLE IF NOT EXISTS users (
            id INT AUTO_INCREMENT PRIMARY KEY,
            email VARCHAR(255) NOT NULL,
            first_name VARCHAR(255) NOT NULL,
            last_name VARCHAR(255) NOT NULL,
            status TINYINT NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        ) ENGINE=INNODB;";
        $db->pdo->exec($sql);
    }
    public function down() {
        $db = \app\base\Application::$app->db;
        $SQL = "DROP TABLE IF EXISTS users";
        $db->pdo->exec($SQL);
    }
}