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

            $s = '
public class Solution() {
    public static void main(String[] args) {
        
    }
}';
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
                <a href="../tasks">Aufgabenübersicht</a>
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
            <div class="header">
                <?php
                    echo "<p>Aufgabe " . $result[0][0] . ": " . $result[0][1] . "</p>";
                ?>
            </div>
            <div class="task">
                <div class="input">
                    <textarea id="input" readonly>
                        <?php
                            echo htmlspecialchars($input); 
                        ?>
                    </textarea>
                </div>
                <div class="code">
                    <div class="editor">
                        <form id="submission" action="./submission.php">
                            <textarea name="sub" id="sub">
                                <?php 
                                    echo htmlspecialchars($s);
                                ?>
                            </textarea>
                            <input type="text" hidden=true value="<?php echo $id; ?>" name="beispiel">
                            <div class="buttons">
                        <tr>
                            <td>
                                <button id="ergebnisse">Ergebnisse</button>
                            </td>
                        </tr>
                        <button id="run" type="submit">Ausführen</button>
                    </div>
                        </form>
                    </div>
                    
                </div>
            </div>
            <script src="./script.js"></script>
        </div>
        
    </body>
</html><?php
}else{
    header("Location: ../index.php");
}
