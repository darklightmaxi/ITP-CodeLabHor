<?php
include '../database_conn.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (null !== $_POST['taskname'] && null !== $_POST['taskdescription'] && null !== $_POST['taskcode']){
        $taskname = $_POST['taskname'];
        $taskdescription = $_POST['taskdescription'];
        $taskcode = $_POST['taskcode'];
        
        $sql = "INSERT INTO Beispiel(name) VALUES ('$taskname');";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();

        chdir("../beispiele");
        shell_exec("mkdir '$taskname'");
        chdir("$taskname");
        shell_exec("echo '$taskdescription' > 'aufgabe.txt'");
        shell_exec("echo '$taskcode' > 'muster.txt'");
    }
}
?>
