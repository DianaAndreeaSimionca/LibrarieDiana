<td valign="top" width="20%">
    <div style="width: 96%; background-color:#F9F1E7; padding:4px; border: solid #632415 1px">
        <b><?php echo _('Alege domeniul') ?></b>
        <HR size="1">
        <?php

            //orders the domain of books by "nume domeniu" (the domain's name)
            $sql     = "SELECT nume_domeniu FROM domenii ORDER BY nume_domeniu ASC";
            $resursa = mysqli_query($db, $sql);
            while ($row = mysqli_fetch_array($resursa))
            {
                print '<a href="domain.php?nume_domeniu=' . _($row['nume_domeniu']) . '">' . $row['nume_domeniu'] . '</a><br>';
            }

        ?>

    </div>
    <br>
    <div style="width:96%; background-color:#F9F1E7; padding:4px; border:solid #632415 1px">
        <form action="search.php" method="GET">
            <b><?php echo gettext('Cautare') ?></b><br>
            <input type="text" name="cuvant" size="12" width="100%"><br>
            <input type="submit" value="<?php echo _("Cauta"); ?>" width="100%">
        </form>
    </div>
    <br>
    <div style="width: 96%; background-color: #F9F1E7; padding: 4px; border: solid #632415 1px">
        <b><?php echo _('Cos'); ?></b><br>

        <?php

            //initialize the number of books and the total amount of books with 0
            $nrCarti      = 0;
            $totalValoare = 0;

            // shows up the number of books in the shopping cart and sums up their price
            if (isset($_SESSION['titlu']) == true)
            {
                for ($i = 0; $i < count($_SESSION['titlu']); $i++)
                {
                    $nrCarti      = $nrCarti + $_SESSION['nr_buc'][$i];
                    $totalValoare = $totalValoare + ($_SESSION['nr_buc'][$i] * $_SESSION['pret'][$i]);
                }
            }
            echo sprintf(_('Aveti %d carti in cos, in valoare totala de %d lei.'), $nrCarti, $totalValoare);

            echo '<a href="shopping_cart.php">'._("Click aici pentru a vedea continutul cosului").'</a>';
        ?>

    </div>
</td>