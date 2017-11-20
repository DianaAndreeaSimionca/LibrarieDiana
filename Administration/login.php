<?php

if ($_POST['nume'] == "" || $_POST['parola'] == "")
{
    print 'Trebuie sa completati amandoua campurile!<br><a href="index.php">Inapoi</a>';
    exit;
}

include ("../connect_db.php");

$parolaEncriptata = md5($_POST['parola']);
$sql = "SELECT * FROM admin WHERE admin_nume= '".$_POST['nume']."' AND admin_parola = '".$parolaEncriptata."'";
$resursa = mysqli_query($db, $sql);

if (mysqli_num_rows($resursa) != 1)
{
    print 'Nume sau parola gresite!<br><a href="index.php">Inapoi</a>';
    exit;
}

session_start();

$_SESSION['nume_admin'] = $_POST['nume'];
$_SESSION['parola_encriptata'] = $parolaEncriptata;
$_SESSION['key_admin'] = session_id();
header("location: admin.php");

?>