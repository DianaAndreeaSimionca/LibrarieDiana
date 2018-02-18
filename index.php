<?php
    include("page_top.php");
    include("menu.php");
?>

<td valign="top">
    <h1><?php echo _('Prima pagina'); ?></h1>
    <b><?php echo _('Cele mai noi carti'); ?></b>
    <table cellpadding="5">
        <tr>

            <?php

                // gets the newest book added in the library
                $sql     = "SELECT carti.id_carte, autori.id_autor, data, titlu, nume_autor, pret FROM carti, autori WHERE carti.id_autor=autori.id_autor ORDER BY data DESC LIMIT 0,3";
                $resursa = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($resursa))
                {
                    /*deschidem celula tabelului html*/
                    print '<td align="center">';
                    $adresaImagine = "coperte" . $row['id_carte'] . ".jpg";
                    if (file_exists($adresaImagine))
                    {
                        print '<img src="' . $adresaImagine . '" width="75" height="100"><br>';
                    }
                    else
                    {
                        print '<div style="width: 75px; height: 100px; border: 1px black solid; background-color: #cccccc">'._("Fara imagine").'</div>';
                    }
                    print '<b><a href="carte.php?id_carte=' . $row['id_carte'] . '">' . $row['titlu'] . '</a></b><br>'._("de").' <i>' . $row['nume_autor'] . '</i><br>'._("Pret:").' ' . $row['pret'] . ' lei</td>';
                }
            ?>
        </tr>
    </table>
    <hr>
    <b><?php echo _('Cele mai populare carti'); ?></b>
    <table cellpadding="5">
        <tr>
            <?php

                // gets the most popular books of the library
                $sqlVanzari     = "SELECT carti.id_carte, sum(nr_buc) AS bucatiVandute FROM vanzari, carti GROUP BY carti.id_carte ORDER BY bucatiVandute DESC LIMIT 0,3";
                $resursaVanzari = mysqli_query($db, $sqlVanzari);
                while ($rowVanzari = mysqli_fetch_array($resursaVanzari))
                {
                    $sqlCarte     = "SELECT * FROM carti, autori WHERE carti.id_autor=autori.id_autor AND carti.id_carte=" . $rowVanzari['id_carte'];
                    $resursaCarte = mysqli_query($db, $sqlCarte);
                    while ($rowCarte = mysqli_fetch_array($resursaCarte))
                    {

                        print '<td align = "center">';
                        $adresaImagine = "coperte/" . $rowVanzari['id_carte'] . ".jpg";
                        if (file_exists($adresaImagine))
                        {
                            print '<img src = "' . $adresaImagine . '" width="75" height="100"><br>';
                        }
                        else
                        {
                            print '<div style="width: 75px; height: 110px; border: 1px black solid; background-color:#cccccc">'._("Fara imagine").'</div>';
                        }
                        print '<b><a href="carte.php?id_carte=' . $rowVanzari['id_carte'] . '">' . $rowCarte['titlu'] . '</a></b><br> '._("de").' <i>' . $rowCarte['nume_autor'] . '</i><br>'._("Pret:").$rowCarte['pret']._("lei").'</td>';
                    }
                }
            ?>
        </tr>
    </table>
</td>
</tr>
</table>

<?php
    include("page_bottom.php");
?>

