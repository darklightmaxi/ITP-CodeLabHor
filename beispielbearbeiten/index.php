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
            //echo var_dump($_GET['sub']);

            // SQL-Abfrage ausführen
            $sql = "SELECT * FROM Beispiel where beispielid=$id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll();

            $filePath = '../beispiele/' . $result[0][1] . '/aufgabe.txt';
            if (file_exists($filePath)) {
                $input = file_get_contents($filePath);
            }
            else {
                $input = 'Datei nicht gefunden';
            }

            $filePath = '../beispiele/' . $result[0][1] . '/muster.txt';
            if (file_exists($filePath)) {
                $input2 = file_get_contents($filePath);
            }
            else {
                $input2 = 'Datei nicht gefunden';
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
                <?php
                    echo "<p>Bearbeiten der Aufgabe " . $result[0][0] . ": " . $result[0][1];
                ?>
            </div>
            <div class="content">
                <div class='left'>
                    <p>Aufgabenstellung</p>
                    <form action="changetask.php" method="POST">
                        <textarea style="font-family: 'DM Sans', sans-serif" id="input" name="input" spellcheck="false"><?php
                            echo htmlspecialchars($input);
                            ?>
                        </textarea>
                        <input type="hidden" name="beispiel" value="<?php echo $id; ?>">
                        <button id="run">Ändern</button>
                    </form>
                </div>
                <div class='right'>
                    <p>Musterlösung</p>
                    <form action="changemuster.php" method="POST">
                        <textarea id="input" name="input" spellcheck="false"><?php
                                echo htmlspecialchars($input2);
                            ?>
                        </textarea>
                        <input type="hidden" name="beispiel" value="<?php echo $id; ?>">
                        <button id="run">Ändern</button>
                    </form>
                </div>
            </div>
        </div>
        <div style="width: 100%; text-align: center">
            <a href="../testsbearbeiten/index.php?beispiel=<?php echo $id; ?>"><input type="hidden" name="beispiel" value="<?php echo $id; ?>"><button style="background: #385673; width: 90%" id="run">Tests Bearbeiten</button></a>
        </div>
    </body>
</html><?php
}else{
    header("Location: ../index.php");
}
