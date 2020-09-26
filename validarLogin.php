<?php
session_start();
if (!isset($_SESSION['loginTrue'])) {
    session_destroy();
    echo "<meta http-equiv='Refresh' content='0; url=login.php' />";
    die();
} else {
    if (!isset($_SESSION['idSession'])) {
        session_destroy();
        echo "<meta http-equiv='Refresh' content='0; url=login.php' />";
        die();
    } else {
        $sessionIdFora = $_SESSION['idSession'];
        $sessinIdDentro = session_id();

        if ($sessionIdFora != $sessinIdDentro) {
            session_destroy();
            echo "<meta http-equiv='Refresh' content='0; url=login.php' />";
            die();
        }
    }
}
