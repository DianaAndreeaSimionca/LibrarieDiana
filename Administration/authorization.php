<?php

session_start();

if ($_SESSION['key_admin'] != session_id())
{
    print 'Acces neautorizat';
    exit;
}

include ("../connect_db.php");

$sql = "SELECT * FROM admin WHERE admin_nume= '".$_SESSION['nume_admin']."' AND admin_parola = '".$_SESSION['parolaEncriptata']."'";
$resursa = mysqli_query($db, $sql);

if (mysqli_num_rows($resursa) != 1)
{
    print 'Acces neautorizat';
    exit;
}
?>