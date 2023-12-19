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
            $schuelerid = 9039;
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
                <a href="#">Ranking</a>
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
                <a href="../logout.php"><i class="fas fa-sign-out-alt"></i></a>
            </nav>
        </nav>

        <div class="container">
            <table>
                <th>
                    <h2>Ranking: Eingereichte Tests</h2>
                </th>
                <tr>
                    <td>#1 Max Mustermann <span id="hidden-rank">(Bre, Wappler)</span></td>
                    <td>141</td>
                </tr>
                <tr>
                    <td>#2 Justin Bieber (Imperator)</td>
                    <td>92</td>
                </tr>
                <tr>
                    <td>#3 Lionel Messi (Tribun)</td>
                    <td>53</td>
                </tr>
                <tr>
                    <td>#4 Cristiano Ronaldo (Tribun)</td>
                    <td>53</td>
                </tr>
                <tr>
                    <td>#5 August Hörandl (Senator)</td>
                    <td>42</td>
                </tr>
                <tr>
                    <td>#6 Joe Biden (Senator)</td>
                    <td>41</td>
                </tr>
                <tr>
                    <td>#7 Kylian Mbappe (Konsul)</td>
                    <td>38</td>
                </tr>
                <tr>
                    <td>#8 Martin Bierbaumer (Prätor)</td>
                    <td>20</td>
                </tr>
                <tr>
                    <td>#9 Maximilian Kniely</td>
                    <td>1</td>
                </tr>
            </table>
        </div>
        
    </body>
</html><?php
}else{
    header("Location: ../index.php");
}
