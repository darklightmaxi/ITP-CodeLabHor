<?php
session_start();
include "db_connection.php";

$error = false;
if (isset($_SESSION['email']) && isset($_SESSION['personid'])) {
    if (isset($_POST['klasse'])) {
        $selectedKlasseId = $_POST['klasse'];

        $checkSql = "SELECT * FROM person WHERE personid = '{$_SESSION['personid']}'";
        $checkResult = mysqli_query($conn, $checkSql);

        if (mysqli_num_rows($checkResult) > 0) {
            $updateSql = "UPDATE person SET fk_klasse = '$selectedKlasseId' WHERE personid = '{$_SESSION['personid']}'";
            mysqli_query($conn, $updateSql);

            header("Location: homepage/index.php");
        }
    } else {
        $error = true;
    }
    ?>
    <!-- Class Website -->
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <?php
        include('database_conn.php');
        ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" integrity="sha512-..." crossorigin="anonymous" />

        <!-- Title of the Website -->
        <title>CodeLabHor - Die innovative Lernplattform</title>

        <!-- Charset for correct character rendering -->
        <meta charset="UTF-8">

        <!-- Responsive design meta tag -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- Link to CSS and JS files -->
        <link rel="stylesheet" type="text/css" href="styles.css">
        <script src="./script.js"></script>

        <!-- Link to Google DM Sans Font -->
        <link href='https://fonts.googleapis.com/css?family=DM Sans' rel='stylesheet'>

        <!-- Description for search engines -->
        <meta name="description" content="CodeLabHor - Die innovative Lernplattform der HTL 3 Rennweg">

        <!-- Information about the authors -->
        <meta name="author" content="CodeLabHor, Maximilian Kniely">

        <!-- Favicon links -->
        <link rel="apple-touch-icon" sizes="180x180" href="./favicon/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="./favicon/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="16x16" href="./favicon/favicon-16x16.png">
        <link rel="manifest" href="./favicon/site.webmanifest">
        <link rel="mask-icon" href="./favicon/safari-pinned-tab.svg" color="#5bbad5">
        <meta name="msapplication-TileColor" content="#da532c">
        <meta name="theme-color" content="#ffffff">

    </head>
    <body>
    <form action="class.php" method="post">
        <h1>CodeLabHor</h1>
        <?php
            if($error){
                echo "Klasse konnte nicht eingetragen werden. Bitte nochmal probieren";
            }
        ?>
        <h2>Klasse auswählen</h2>
        <label for="klasse">Klassen</label>
        <?php
        $sql1 = "SELECT * FROM klasse;";
        $result1 = mysqli_query($conn, $sql1);

        if (mysqli_num_rows($result1) > 0) {
            echo "<select class='select-design' id='klasse' name='klasse'>";
            while ($row = mysqli_fetch_assoc($result1)) {
                echo "<option value='" . $row['klasseid'] . "'>" . $row['klasseid'] . "</option>";
            }
            echo "</select>";
        } else {
            echo "<p>No classes found.</p>";
        }
        ?>
        <br>
        <button class="login" type="submit">Weiter</button>
        <br>
        <br>
        <div style="width: 100%; text-align: center">
        <a style=" color: #2C2C2C; font-size: 14px" href="index.php">Zurück zum Login</a>
        </div>
    </form>
    </body>
    </html>
    <?php
} else {
    header("Location: index.php");
    exit(); // Terminate script after redirection
}
?>
