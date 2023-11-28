<?php
$servername = "localhost";   // Hostname des Datenbankservers
$username = "root";          // Benutzername für die Datenbank
$password = "";      // Passwort für die Datenbank
$database = "codelabhor";     // Name der Datenbank

// Verbindung zur Datenbank herstellen
try {
    // Verbindung zur Datenbank herstellen
    $pdo = new PDO("mysql:host=$servername;dbname=$database", $username, $password);

    // Fehlermodus auf Ausnahme setzen
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    //echo "Verbindung zur Datenbank erfolgreich hergestellt.";
}
catch (PDOException $e) {
    echo "Verbindung zur Datenbank fehlgeschlagen: " . $e->getMessage();
}
?>