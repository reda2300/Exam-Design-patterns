<?php

require_once 'DataSource.php';

class DatabaseDataSource extends DataSource {
    private $dbConnection1;
    private $dbConnection2;

    public function __construct(PDO $dbConnection1, PDO $dbConnection2) {
        $this->dbConnection1 = $dbConnection1;
        $this->dbConnection2 = $dbConnection2;
    }

    public function fetchData() {
       
        $data1 = $this->fetchFromDatabase($this->dbConnection1, "SELECT * FROM employees WHERE hire_date >= '2024-01-01'");
        $data2 = $this->fetchFromDatabase($this->dbConnection2, "SELECT * FROM employees_in_trial_period WHERE hire_date >= '2024-01-01'");

        return array_merge($data1, $data2);
    }

    private function fetchFromDatabase(PDO $db, $query) {
        $stmt = $db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
