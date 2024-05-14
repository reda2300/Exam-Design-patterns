<?php

require_once 'DataSource.php';

class CsvDataSource extends DataSource {
    private $filePath;

    public function __construct($filePath) {
        $this->filePath = $filePath;
    }

    public function fetchData() {
       
        if (!file_exists($this->filePath)) {
            throw new Exception("CSV file not found: {$this->filePath}");
        }

        $data = [];
        if (($handle = fopen($this->filePath, "r")) !== FALSE) {
            while (($row = fgetcsv($handle, 1000, ",")) !== FALSE) {
                $data[] = $row;
            }
            fclose($handle);
        }
        return $data;
    }
}
