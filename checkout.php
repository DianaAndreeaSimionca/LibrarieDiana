<?php
    // start the session
    session_start();
    include("connect_db.php");
    include("page_top.php");
    include("menu.php");
?>

    <td valign="top">
        <h1><?php echo _("Casa"); ?></h1>
        <?php echo _("Acestea sunt cartile comandate de dvs.:");?>
        <!-- make a table to present all the book from the shopping cart -->
        <table border="1" cellspacing="0" cellpadding="4">
            <tr bgcolor="#F9F1ET">
                <td><b><?php echo _("Nr. buc"); ?></b></td>
                <td><b><?php echo _("Carte"); ?></b></td>
                <td><b><?php echo _("Pret"); ?></b></td>
                <td><b><?php echo _("Total"); ?></b></td>
            </tr>
            <?php
                // initialize the total amount of the books with 0
                $totalGeneral = 0;

                // iterate throw all the books in the session what user want to buy
                for ($i = 0; $i < count($_SESSION['id_carte']); $i++)
                {
                    if ($_SESSION['nr_buc'][$i] != 0)
                    {
                        // show to the user the number of books from that type and the price
                        print  '<tr><td>' . $_SESSION['nr_buc'][$i] . '</td>
                                <td><b>' . $_SESSION['titlu'][$i] . '</b> de ' . $_SESSION['nume_autor'][$i] . '</td>
                                <td align="right">' . $_SESSION['pret'][$i] . ' lei</td>
                                <td align="right">' . ($_SESSION['pret'][$i] * $_SESSION['nr_buc'][$i]) . ' lei</td>
                                </tr>';

                        // add to the total amount number of books * price (for every book)
                        $totalGeneral = $totalGeneral + ($_SESSION['pret'][$i] * $_SESSION['nr_buc'][$i]);
                    }
                }
                print  '<tr><td align="right" colspan="3"><b>'._("Total de plata").'</b></td>
                        <td align="rifht"><b>' . $totalGeneral . '</b> lei</td>
                        </tr>';
            ?>
        </table>
        <h1><?php echo _("Detalii"); ?></h1>
        <!-- make a form if user place the checkout -->
        <form action="finish_command.php" method="post">
            <table>
                <tr>
                    <td><b><?php echo _("Numele:"); ?></b></td>
                    <td><input type="text" name="nume"></td>
                </tr>
                <tr>
                    <td valign="top"><b><?php echo _("Adresa:"); ?></b></td>
                    <td><textarea name="adresa" rows="6"></textarea></td>
                </tr>
                <tr>
                    <td><input type="submit" value="<?php echo _("Trimite!"); ?> "></td>
                </tr>
            </table>
        </form>
    </td>

<?php
    include("page_bottom.php");
?>