<?php
session_start();

if (isset($_SESSION['email']) AND isset($_SESSION['personid'])) {
?>
<!-- AufgabenÜbersicht -->
<!DOCTYPE html>
<html>
    <head>
        <?php
            include('../database_conn.php');
            $id = $_GET['beispiel'];
            $sql = "SELECT * FROM Beispiel where beispielid=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $beispiel = $stmt->fetchAll();

            //echo var_dump($beispiel[0][1]); //1 ist name, 0 index

            // Auflistung der Files, gespliced weil ./ und ../ interessieren mich nicht

            $directory = "../beispiele/" . $beispiel[0][1] . "/submissions/" . $_SESSION['personid'] . "/";

            mkdir($directory, true);
            //echo getcwd() . "<br>";
            chdir($directory);
            //echo getcwd();
            
            $files = array_slice(scandir("./"), 2);

            // Höchste Nummer finden und 1 addieren für eindeutigen Namen

            //echo var_dump($files)[0];
            //echo getcwd();

            $newFileNumber = 0;
            foreach ($files as $file){
                $newFileNumber = max(explode('.', $file)[0], $newFileNumber);
            }
            $newFileNumber += 1;
            
            $file = getcwd() . '/' . $newFileNumber . '.txt';
            
            // In File schreiben

            $content = $_GET['sub'];

            $myfile = fopen($file, "w") or die("Unable to open file!");
            fwrite($myfile, $content);
            fclose($myfile);

            // Execute der Bash befehle

            chdir("../../tests/");

            $submissionfile = $file;

            $resultfile = "temp";

            $okay = 0;
            $notokay = 0;
            $passed = [];
            $notpassed = [];

            $files = array_slice(scandir("./"), 2);

            chdir("../../../testeinfügen/");

            $count = 0;
            $slice = array_slice(explode('/', $submissionfile), 6);

            foreach ($files as $testfile){

                $pre = array_slice(explode('/', getcwd()), 0, 5);
                $prePath = implode('/', $pre) . "/beispiele";

                $submissionfile = "../beispiele/" . $slice[0] . "/" . $slice[1] . "/" . $slice[2] . "/" . $slice[3];  // isPalindrom/submissions/3/8.txt
                $testfile = $prePath . "/" . $slice[0] . "/tests/" . $testfile;  // isPalindrom/tests/1.txt

                shell_exec("/bin/bash junit-codelabs.sh " . $submissionfile . " " . $testfile . " " . $resultfile);

                $resultfilehandler = fopen(getcwd() . '/' . $resultfile . '/' . "verdict", "r");

                $result = fread($resultfilehandler, filesize(getcwd() . '/' . $resultfile . '/' ."verdict"));

                if ($result == "0") {
                    $passed[] = end(explode('/', explode('.', $testfile)[0]));
                    $okay++;
                } else {
                    $notpassed[] = end(explode('/', explode('.', $testfile)[0]));
                    $notokay++;
                }
            }

        ?>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-... (integrity hash)" crossorigin="anonymous" />

        <!-- Titel der Website -->
        <title>CODELABHOR - Die innovative Lernplattform</title>

        <!-- Dass alle Zeichen richtig dargestellt werden -->
        <meta charset="UTF-8">

        <!-- Falls die Website mal responsive wird, wichtig für die Anpassung der Seitendarstellung auf verschiedenen Bildschirmgrößen und Geräten-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Verknüpfung zu CSS -->
        <link rel="stylesheet" type="text/css" href="./styles.css">

        <!-- Verknüpfung zu Google DM Sans Font -->
        <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>

        <!-- Beschreibung der Seite, wird von Suchmaschinen verwendet. (WHY NOT?)-->
        <meta name="description" content="CodeLabHor - Die innovative Lernplattform der HTL 3 Rennweg">

        <!-- Informationen über den Autoren -->
        <meta name="author" content="CodeLabHor, Maximilian Kniely">

        <!-- Kleines Bild was neben dem Titel der Seite angezeigt wird (Logo) -->
        <!-- zum generieren des Favicons https://realfavicongenerator.net/ -->
        <link rel="apple-touch-icon" sizes="180x180" href="../favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="../favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="../favicon/favicon-16x16.png">
        <link rel="manifest" href="../favicon/site.webmanifest">
        <link rel="mask-icon" href="../favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body>

        <nav>
            <a href="../homepage"><span id="CodeLabHor"><span id="bold">CODELAB</span>HOR</span></a>
            <nav id="rightnav">
                <a href="../tasks">Aufgabenübersicht</a>
                <!--<a href="../ranking">Ranking</a>-->
                <a href="#">
                    <?php
                        $h = $_SESSION['email'];
                        echo $h;
                    ?>
                </a>
                <a href="../logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </nav>
        </nav>

        <div class="container">
            <div class="header">
                <p> Submitted <br> 
                <?php
                    echo "Erfolgreiche Tests: " . $okay . "   " . "<br>Nicht erfolgreiche Tests: " . $notokay;
                    echo "<br><br> Indexes der erfolgreich absolvierte Tests: <br>" . implode(', ', $passed);
                    echo "<br> Indexes der nicht erfolgreich absolvierte Tests: <br>" . implode(', ', $notpassed);
                ?>
                </p>
            </div>
            <div class="testcase">
                
            </div>
        </div>
        
    </body>
</html><?php
}else{
    header("Location: ../index.php");
}
