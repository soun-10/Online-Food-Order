<?php
    session_start();
    session_destroy(); // remove all session
    header("Location: home.php");
?>