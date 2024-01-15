<?php
include('database_conn.php');

session_start();
if (isset($_SESSION['email']) AND isset($_SESSION['personid'])) {

?>
<!DOCTYPE html>
<html>
    <head>
        <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script>

        <!-- Titel der Website -->
        <title>CODELABHOR - Die innovative Lernplattform</title>

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
        
        <form action="updateclass.php" method="POST">
            <h1>CODELABHOR</h1>

            <h2>
                <?php
                    echo "Hallo " . explode('@', $_SESSION['email'])[0] . ', lege deine Klasse fest.';
                ?>
            </h2>
            <?php if (isset($_GET['error'])){?>
                <p class="error"><?php echo $_GET['error']; ?></p>
            <?php } ?>
            <label>Klasse</label>
            <?php
                $sql = "SELECT * FROM Klasse;";
                $stmt = $pdo->prepare($sql);
                $stmt->execute();
                $result = $stmt->fetchAll();
                
                echo '<select id="options" name="options">';
                foreach ($result as $row) {                    
                    echo "<option>" . $row['klasseid'] . "</option>";
                }
                echo '</select>';
            ?>
            <br>
            <button class="login" type="submit">Festlegen</button>
        </div>
    </body>
</html>
<?php
}else{
    header("Location: ../index.php");
}
?>