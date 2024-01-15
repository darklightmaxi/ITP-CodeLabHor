<?php
include '../database_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    if (isset($_GET['change'])) {
        $beispielid = $_GET['beispielid'];
        $id = $_GET['beispiel'];
        $test = $_GET['test'];
        $change = $_GET['change'];
        chdir('../beispiele/' . $id . '/tests/');
        shell_exec('echo "' . $change . '" > ' . $test);
        header("Location: ../testsbearbeiten/index.php?beispiel=$beispielid");

    } else {
        echo "Etwas ist schief gelaufen";
    }
}
?>
