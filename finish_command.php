<?php
    // verify if name is not empty
    if ($_POST['nume'] == "")
    {
        print 'Trebuie sa completati numele! <a href="shopping_cart.php">Inapoi</a>';
        exit;
    }

    // verify if adresa is not empty
    if ($_POST['adresa'] == "")
    {
        print 'Trebuie sa completati adresa! <a href="shopping_cart.php">Inapoi</a>';
        exit;
    }

    // start the session
    session_start();

    // verify if at least one book exist in the shopping cart
    $nrCarti = array_sum($_SESSION['nr_buc']);
    if ($nrCarti == 0)
    {
        print 'Trebuie sa cumparati cel putin o carte! <a href="shopping_cart.php">Inapoi</a>';
        exit;
    }

    // connect to database
    include("connect_db.php");

    // record the transaction in the database
    $sqlTranzactie     = "INSERT INTO tranzactii (nume_cumparator, adresa_cumparator) VALUES('" . $_POST['nume'] . "','" . $_POST['adresa'] . "')";
    $resursaTranzactie = mysqli_query($db, $sqlTranzactie);

    $id_tranzactie = mysqli_insert_id($db);

    // record the number of book
    for ($i = 0; $i < count($_SESSION['id_carte']); $i++)
    {
        if ($_SESSION['nr_buc'][$i] > 0)
        {
            $sqlVanzare = "INSERT INTO vanzari(id_tranzactie, id_carte, nr_buc) VALUES (" . $id_tranzactie . ", " . $_SESSION['id_carte'][$i] . ", " . $_SESSION['nr_buc'][$i] . ")";

            mysqli_query($db, $sqlVanzare);
        }
    }

    // compose a mail to the owner of the site
    // which contain the order info
    $emailDestinatr = "simionca.andreea.diana@gmail.com";

    $subiect = "O noua comanda!";

    $mesaj = "O noua comanda de la <b>" . $_POST['nume'] . "</b><br>";
    $mesaj .= "Adresa:" . $_POST['adresa'] . "<br>";
    $mesaj .= "Cartile comandate: <br><br>";
    $mesaj .= "<table border='1' cellspacing='0' cellpadding='4'>";

    $totalGeneral = 0;

    for ($i = 0; $i < count($_SESSION['id_carte']); $i++)
    {
        if ($_SESSION['nr_buc'][$i] > 0)
        {
            $mesaj        .= "<tr><td>" . $_SESSION['titlu'][$i] . "de" . $_SESSION['nume_autor'][$i] . " buc</td></tr>";
            $totalGeneral = $totalGeneral + ($_SESSION['nr_buc'][$i] * $_SESSION['pret'][$i]);
        }
    }

    $mesaj .= "</table>";
    $mesaj .= "Total: <b>" . $totalGeneral . "</b>";

    // declare the header of yahoo mail
    $headers = "MIME-Version: 1.0\r\nContent-type: text/html; charset=iso-8859-2\r\n";

    // send the mail
    mail($emailDestinatr, $subiect, $mesaj, $headers);

    // clear the session and distroy it
    session_unset();
    session_destroy();

    include("page_top.php");
    include("menu.php");
?>

    <!-- present a message to confirm the order -->
    <td valign="top">
        <h1>Multumim!</h1>
        Va multumim ca ati cumparat de la noi! Veti primi comanda solicitata in cel mai scurt timp.
    </td>

<?php
    include("page_bottom.php");
?>