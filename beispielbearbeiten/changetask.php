<?php
include '../database_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['input'])) {
        $text = $_POST['input'];
        $beispielid = $_POST['beispiel'];
        $sql = "SELECT name FROM Beispiel where beispielid=$beispielid;";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $beispiel = $stmt->fetch()[0];
        chdir("../beispiele/" . $beispiel);
        shell_exec("echo '$text' > 'aufgabe.txt'");
        header("Location: index.php?beispiel=$beispielid");
    } else {
        echo "Es ist etwas schief gelaufen";
    }
}
?>
