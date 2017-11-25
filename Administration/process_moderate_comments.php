<?php
    include("authorization.php");
    include("admin_top.php");

    if (isset($_POST['modifica']))
    {
        if ($_POST['nume_utilizator'] == "")
        {
            print "Nu ai completat numele utilizatorului!";
        }
        else if ($_POST['adresa_email'] == "")
        {
            print "Nu ai completat adresa de email!";
        }
        else if ($_POST['comentariu'] == "")
        {
            print "Campul Comentariu este gol!";
        }
        else
        {
            $sql = "UPDATE comentarii SET nume_utilizator='" . $_POST['nume_utilizator'] . "', email_utilizator='" . $_POST['adresa_email'] . "', comentariu='" . $_POST['comentariu'] . "' WHERE id_comentariu=" . $_POST['id_comentariu'];
            mysqli_query($db, $sql);
            print "Comentariul a fost modificat!";
        }
    }//if

    if (isset($_POST['sterge']))
    {
        $sql = "DELETE FROM comentarii WHERE id_comentariu=" . $_POST['id_comentariu'];
        mysqli_query($db, $sql);
        print "Comentariul a fost sters cu succes!";
    }//if

    if (isset($_POST['seteaza_moderate']))
    {
        $sql = "UPDATE admin SET ulimul_comentariu_moderat=" . $_POST['ultimul_id'];
        mysqli_query($db, $sql);
        print "Valoarea a fost setata!";
    }//if
?>
</body>
</html>
