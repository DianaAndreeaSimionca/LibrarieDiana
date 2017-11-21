<?php
    if ($_POST['nume_utilizator'] == "" || $_POST['adresa_email'] == "" || $_POST['comentariu'] == "")
    {
        print "Trebuie sa completezi toate campurile!";
        exit;
    }

    include("connect_db.php");

    $numeFaraTag       = strip_tags($_POST['nume_utilizator']);
    $emailFaraTag      = strip_tags($_POST['adresa_email']);
    $comentariuFaraTag = strip_tags($_POST['comentariu']);

    $sql    = "INSERT INTO comentarii(nume_utilizator, email_utilizator, comentariu, id_carte) VALUES ('" . $numeFaraTag . "', '" . $emailFaraTag . "', '" . $comentariuFaraTag . "', " . $_POST['id_carte'] . ")";
    $result = mysqli_query($db, $sql);

    $inapoi = "carte.php?id_carte=" . $_POST['id_carte'];
    header("location: $inapoi");

?>