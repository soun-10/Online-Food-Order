<?php
    session_start();
    session_destroy(); // remove all session
    header("Location: ../../../public/user/loginCustomer.php");
?>