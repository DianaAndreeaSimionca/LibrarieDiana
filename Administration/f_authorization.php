<?php
session_start();

include ("../connect_db.php");

function autorizat($db)
{
    $sql = "SELECT * FROM admin WHERE admin_nume='".$_SESSION['nume_admin']."' AND admin_parola='".$_SESSION['parola_encriptata']."'";
    $resursa = mysqli_query($db, $sql);
    if ($_SESSION['key_admin'] != session_id() || mysqli_num_rows($resursa) != 1)
    {
        return false;
    }
    else
    {
        return true;
    }
}

// change in here

?>