<?php
require 'functions.php';
$host = "localhost";
$username = "root";
$password = "root";
$dbname = "esercizio1_tutorato";

// Set DSN
$dsn = 'mysql:host=' . $host . ';dbname=' . $dbname;

// Create a PDO instance and catch error
try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
} catch (PDOException $e) {
    echo 'Connection failed: ' . $e->getMessage();
}