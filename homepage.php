<!-- Main Website -->
<?php
session_start();

if (isset($_SESSION['email']) AND isset($_SESSION['personid'])) {
    echo "Erfolg";
}else{
    echo "Fehler";
}