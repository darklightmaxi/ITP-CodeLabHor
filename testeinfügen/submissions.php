<?php
// Überprüfen, ob das Formular abgesendet wurde
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Daten aus dem Formular abrufen
    $eingabeText = $_POST["sub"];

    // Hier kannst du mit $eingabeText arbeiten
    echo "Eingegebener Text: " . htmlspecialchars($eingabeText);
}
?>
