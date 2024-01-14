<?php
session_start();
include "db_connection.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['options'])) {
        $class = $_POST['options'];
        $sql = "UPDATE Person SET fk_klasse = '$class' WHERE email = '" . $_SESSION['email'] . "';";
        mysqli_query($conn, $sql); // Execute the SQL statement
        header("Location: homepage/index.php");
        exit();
    } else {
        header("Location: selectclass.php?error=Keine Option ausgewählt");
        exit();
    }
}
?>
