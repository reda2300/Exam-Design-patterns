<?php

require 'src/ReportGenerator.php';
require 'src/CsvDataSource.php';
require 'src/DatabaseDataSource.php';
require 'src/ExternalServiceDataSource.php';

// Exemple 1: Top 10 clients 2023
$dataSource = new CsvDataSource('path/to/csv/top_clients_2023.csv');
$reportGenerator = new ReportGenerator($dataSource);
$report1 = $reportGenerator->generateReport([
    'title' => 'Top 10 Clients 2023',
    'author' => 'Direction',
    'format' => 'JSON',
    'references' => ['Top 10 Clients 2022', 'Top 10 Clients 2021', 'Top 10 Clients 2020'],
    'recipients' => ['Direction']
]);
echo $report1;

// Exemple 2: Embauches mensuelles depuis Jan 2024
$db1 = new PDO('mysql:host=localhost;dbname=company', 'user', 'pass');
$db2 = new PDO('mysql:host=localhost;dbname=hr', 'user', 'pass');
$dataSource = new DatabaseDataSource($db1, $db2);
$reportGenerator = new ReportGenerator($dataSource);
$report2 = $reportGenerator->generateReport([
    'title' => 'Monthly Hires since Jan 2024',
    'author' => 'Service RH',
    'format' => 'CSV',
    'references' => [],
    'recipients' => ['Service RH']
]);
echo $report2;

// Exemple 3: Tickets en cours pour l'application XXX
$dataSource = new ExternalServiceDataSource();
$reportGenerator = new ReportGenerator($dataSource);
$report3 = $reportGenerator->generateReport([
    'title' => 'Ongoing Tickets for Application XXX',
    'author' => 'Support Team',
    'format' => 'JSON',
    'references' => [],
    'recipients' => ['Support Team']
]);
echo $report3;
