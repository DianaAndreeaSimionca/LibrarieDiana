<?php
    // start the session
    session_start();

    // include connection to database
    include("../connect_db.php");

    // make a function to authorize the admin
    function autorizat($db)
    {
        // search the admin with username and password given
        $sql     = "SELECT * FROM admin WHERE admin_nume='" . $_SESSION['nume_admin'] . "' AND admin_parola='" . $_SESSION['parola_encriptata'] . "'";
        $resursa = mysqli_query($db, $sql);

        // verify if the results gives only one admin if not the access is denied
        // return true if admin is ok
        // else return false
        if ($_SESSION['key_admin'] != session_id() || mysqli_num_rows($resursa) != 1)
        {
            return false;
        }
        else
        {
            return true;
        }
    }
?>