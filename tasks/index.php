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
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-... (integrity hash)" crossorigin="anonymous" />

        <!-- Titel der Website -->
        <title>CodeLabHor - Die innovative Lernplattform</title>

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
            <a href="../homepage"><span id="CodeLabHor"><span id="bold">CodeLab</span>Hor</span></a>
            <nav id="rightnav">
                <a href="#">Aufgabenübersicht</a>
                <a href="../ranking">Ranking</a>
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
            <?php
        
                $sql = "SELECT rolle FROM Person WHERE email = '$h'";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $rolle = $stmt->fetch()['rolle'];
        
                // SQL-Abfrage ausführen
                $sql = "SELECT * FROM Beispiel";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();

                
                
                echo "<table>";
                echo "<th>";
                echo "<h2>Aufgabenübersicht</h2>";
                echo "</th>";
                
                foreach($result as $beispiel){
                    echo "<tr>";
                    echo "<td><a href='../beispiel/index.php?beispiel=" . $beispiel[0] . "' class='link'> Aufgabe " . $beispiel[0] . ": " . $beispiel[1] . "</a></td>";
                    echo "<td><a href='../testeinfügen/index.php?beispiel=" . $beispiel[0] . "'>Testcases einfügen</a></td>";
                    echo "<td><a href='../beispielranking'>Ranking</a></td>";
                    echo "<td><a href='../beispiel/index.php?beispiel=" . $beispiel[0] . "'> Anzeigen </a></td>"; 
                    if($rolle == "L"){
                        echo "<td><a href='../beispielbearbeiten/index.php?beispiel=" . $beispiel[0] . "'>Bearbeiten</a></td>";
                    }                   
                    echo "</tr>";
                }
                if ($rolle == "L"){
                    echo "<tr> <td><a href='../beispieleinfügen/index.php'>Aufgabe hinzufügen</a></td> </tr>";
                }
                echo "</table>";
                
            ?>
        </div>
        
    </body>
</html>
<?php
}else{
    header("Location: ../index.php");
}
