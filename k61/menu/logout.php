<?php
    #ZAMYKAMY SESJĘ
    session_start();
    session_unset();
    header('Location: ../index.php');
?>