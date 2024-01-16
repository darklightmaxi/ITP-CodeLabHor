<?php
session_start();
include "db_connection.php";

/*$sql = "SELECT * FROM Person WHERE email='$uname';";
$result = mysqli_query($conn, $sql);
var_dump($result);

if (!isset($_POST['uname']) || ) {
    header("Location: register.php");
    exit();
}*/

if (isset($_POST['uname']) && isset($_POST['password'])) {

    function validate($data){
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $uname = validate($_POST['uname']);
    $pass = validate($_POST['password']);

    if (empty($uname)) {
        header("Location: index.php?error=E-Mail is required");
        exit();
    }else if(empty($pass)){
        header("Location: index.php?error=Password is required");
        exit();
    }else{
        $sql = "SELECT * FROM Person WHERE email='$uname' AND password='$pass'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {
            $row = mysqli_fetch_assoc($result);
            $_SESSION['email'] = $row['email'];
            $_SESSION['personid'] = $row['personid'];
            

            if ($row['email'] === $uname && $row['password'] === $pass) {
                if ($row['klasseid'] === NULL){
                    header("Location: selectclass.php");
                    exit();
                }
                header("Location: homepage\index.php");
                exit();
            }else{
                header("Location: index.php?error=Incorrect E-Mail or password");
                exit();
            }
        }else{
            header("Location: index.php?error=Incorrect E-Mail or password");
            exit();
        }
    }
}else{
    header("Location: index.php");
    exit();
}