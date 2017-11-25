<?php
include ("authorization.php");
include ("admin_top.php");

print "<h1>Comenzi</h1>";
if (isset($_POST['comanda_onorata']))
{
    $sql = "UPDATE tranzactii SET tranzactii.comanda_onorata=1 WHERE tranzactii.id_tranzactie=".$_POST['id_tranzactie'];
    mysqli_query($db, $sql);
    print "Comanda a fost onorata!";
}//if

if (isset($_POST['anuleaza_comanda']))
{
    $sqlTranzactii = "DELETE FROM tranzactii WHERE tranzactii.id_tranzactie=".$_POST['id_tranzactie'];
    mysqli_query($db, $sqlTranzactii);
    $sqlCarti = "DELETE FROM vanzari WHERE tranzactii.id_tranzactie=".$_POST['id_tranzactie'];
    mysqli_query($db, $sqlCarti);
    print "Comanda a fost anulata!";
}//if
?>
</body>
</html>
