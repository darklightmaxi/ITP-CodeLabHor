<!-- Main Website -->
<!DOCTYPE html>
<html>
    <head>
        <?php
            include('../database_conn.php');
        ?>

        <!-- Titel der Website -->
        <title>CodeLabHor - Die innovative Lernplattform</title>

        <!-- Dass alle Zeichen richtig dargestellt werden -->
        <meta charset="UTF-8">

        <!-- Falls die Website mal responsive wird, wichtig für die Anpassung der Seitendarstellung auf verschiedenen Bildschirmgrößen und Geräten-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Verknüpfung zu CSS und JS -->
        <link rel="stylesheet" type="text/css" href="./styles.css">
        <script src="./script.js"></script>

        <!-- Verknüpfung zu Google DM Sans Font -->
        <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>

        <!-- Beschreibung der Seite, wird von Suchmaschinen verwendet. (WHY NOT?)-->
        <meta name="description" content="CodeLabHor - Die innovative Lernplattform der HTL 3 Rennweg">

        <!-- Informationen über den Autoren -->
        <meta name="author" content="CodeLabHor, Maximilian Kniely">

        <!-- Kleines Bild was neben dem Titel der Seite angezeigt wird (Logo) -->
        <!-- zum generieren des Favicons https://realfavicongenerator.net/ -->
        <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
        <link rel="manifest" href="./favicon/site.webmanifest">
        <link rel="mask-icon" href="./favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body>

        <nav>
            <a href="#"><span id="CodeLabHor"><span id="bold">CodeLab</span>Hor</span></a>
            <nav id="rightnav">
                <a href="../tasks">Aufgabenübersicht</a>
                <a href="../ranking">Ranking</a>
                <a href="#">
                    <?php
                        $sql = "SELECT email FROM Person WHERE email='9039@htl.rennweg.at';";
                        $stmt = $pdo->prepare($sql);
                        $stmt->execute();
                        $result = $stmt->fetchAll();
                        $value = current(current(array_slice($result, 0, 1)));
                        echo $value;
                    ?>
                </a>
            </nav>
        </nav> 
        <div class="container">
            <div class="left-div">
                <h2>Aufgabenübersicht</h2>
                <p>In dieser Übersicht erwarten dich vielfältige Aufgaben, die deine Fähigkeiten in Coding, Schreiben und kreativem Denken herausfordern und erweitern werden.</p>
                <a href="../tasks">
                    <button class="blue-button">Los Geht's</button>
                </a>
            </div>
            <div class="right-div">
                <h2>Rankings</h2>
                <p>In dieser Übersicht siehst du ein Ranking über die Schüler mit am meisten eingereichten Tests.</p>
                <a href="../ranking">
                    <button class="blue-button">Anzeigen</button>
                </a>
            </div>
        </div>
        
    </body>
</html>
