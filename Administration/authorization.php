<?php

    session_start();

    // verify if the current session had expired
    if ($_SESSION['key_admin'] != session_id())
    {
        print 'Acces neautorizat';
        exit;
    }

    // includes the connection to the database
    include("../connect_db.php");

    // search the admin with username and password given
    $sql     = "SELECT * FROM admin WHERE admin_nume= '" . $_SESSION['nume_admin'] . "' AND admin_parola = '" . $_SESSION['parola_encriptata'] . "'";
    $resursa = mysqli_query($db, $sql);

    // verify if the results gives only one admin if not the access is denied
    if (mysqli_num_rows($resursa) != 1)
    {
        print 'Acces neautorizat';
        exit;
    }
?>