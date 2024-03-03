<?php 

class m0002_add_password_column {
    public function up() {
        $db = \app\core\Application::$app->db;
        $sql = "ALTER TABLE users ADD COLUMN (
            password VARCHAR(255) NOT NULL
        )";
        $db->pdo->exec($sql);
    }
    public function down() {
        $db = \app\base\Application::$app->db;
        $sql = "ALTER TABLE users DROP COLUMN (
            password VARCHAR(255) NOT NULL
        )";
        $db->pdo->exec($sql);
    }
}