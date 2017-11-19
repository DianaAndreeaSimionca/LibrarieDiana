<?php
session_start();
include ("connect_db.php");
include ("page_top.php");
include ("menu.php");

$actiune = $_GET['actiune'];

if(isset($_GET['actiune']) && $_GET['actiune'] == "adauga")
{
    $_SESSION['id_carte'][] = $_POST['id_carte'];
    $_SESSION['nr_buc'][] = 1;
    $_SESSION['pret'][] = $_POST['pret'];
    $_SESSION['titlu'][] = $_POST['titlu'];
    $_SESSION
}
?>