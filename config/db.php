<?php
// config/db.php

define('DB_HOST', '192.168.1.129');
define('DB_PORT', '3306');
define('DB_NAME', 'vite_et_gourmand');
define('DB_USER', 'root');
define('DB_PASS', 'ThowaezaBD26041981');

try {
    $dsn = "mysql:host=" . DB_HOST . ";port=" . DB_PORT . ";dbname=" . DB_NAME . ";charset=utf8mb4";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    $pdo = new PDO($dsn, DB_USER, DB_PASS, $options);
} catch (PDOException $e) {
    error_log("Erreur de connexion BDD : " . $e->getMessage());
    echo "<h1>Service momentanément indisponible</h1>";
    echo "<p>Une erreur technique est survenue. Veuillez réessayer plus tard.</p>";
    exit;
}