<?php
    session_start();
    include("connect_db.php");
    include("page_top.php");

    if (isset($_GET['actiune']) && $_GET['actiune'] == "adauga")
    {
        $_SESSION['id_carte'][]   = $_POST['id_carte'];
        $_SESSION['nr_buc'][]     = 1;
        $_SESSION['pret'][]       = $_POST['pret'];
        $_SESSION['titlu'][]      = $_POST['titlu'];
        $_SESSION['nume_autor'][] = $_POST['nume_autor'];
    }
    if (isset($_GET['actiune']) && $_GET['actiune'] == "modifica")
    {
        for ($i = 0; $i < count($_SESSION['id_carte']); $i++)
        {
            $_SESSION['nr_buc'][$i] = $_POST['noulNrBuc'][$i];
        }
    }

    include("menu.php");
?>

<td valign="top">
    <h1>Cosul de cumparaturi</h1>
    <form action="shopping_cart.php?actiune=modifica" method="post">
        <table border="1" cellpadding="4" cellspacing="0">
            <tr bgcolor="#F9F1E7">
                <td><b>Numar bucati</b></td>
                <td><b>Carte</b></td>
                <td><b>Pret</b></td>
                <td><b>Total</b></td>
            </tr>
            <?php
                $totalGeneral = 0;

                if (isset($_SESSION['id_carte']) == true)
                {
                    for ($i = 0; $i < count($_SESSION['id_carte']); $i++)
                    {
                        print '<tr><td><input type="text" name="noulNrBuc[' . $i . ']" size="1" value="' . $_SESSION['nr_buc'][$i] . '"></td>
                           <td><b>' . $_SESSION['titlu'][$i] . '</b> de ' . $_SESSION['nume_autor'][$i] . '</td>
                           <td align="right">' . $_SESSION['pret'][$i] . ' lei</td>
                           <td align="right">' . ($_SESSION['pret'][$i] * $_SESSION['nr_buc'][$i]) . ' lei</td>
                           </tr>';
                        $totalGeneral = $totalGeneral + ($_SESSION['pret'][$i] * $_SESSION['nr_buc'][$i]);
                    }
                }
                print '<tr><td align="right" colspan="3"><b>Total in cos</b></td>
                       <td align="right"><b>' . $totalGeneral . '</b> lei</td> 
                   </tr>';
            ?>
        </table>
        <input type="submit" value="Modifica"><br><br>
        Introduceti <b>0</b> pentru cartile ce doriti sa le scoateti din cos!
        <h1>Continuare</h1>
        <table>
            <tr>
                <td width="200" align="center">
                    <img src="cos.gif">
                    <a href="index.php">Continua cumparaturile</a>
                </td>
                <td width="200" align="center">
                    <img src="checkout.gif">
                    <a href="checkout.php">Mergi la casa</a>
                </td>
            </tr>
        </table>
    </form>
    <?php
        include("page_bottom.php");
    ?>

    <br>




