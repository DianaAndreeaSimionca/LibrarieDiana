<?php
    // start the session
    session_start();
    include("connect_db.php");
    include("page_top.php");
    include("menu.php");

    // get the current domain
    $numeDomeniu = $_GET['nume_domeniu'];
?>

    <td align="top">
        <h1><?php echo _("Domeniu:"); ?> <?php print $numeDomeniu ?></h1>
        <b><?php echo _("Carti in domeniul"); ?>
            <u><i><?php print $numeDomeniu ?></i></u>:
        </b>
        <table cellpadding="5">
            <?php

                // get all the book from coresponding domain
                $sql     = "SELECT * FROM carti, autori, domenii WHERE carti.id_domeniu=domenii.id_domeniu AND carti.id_autor=autori.id_autor AND domenii.nume_domeniu='" . $numeDomeniu . "'";
                $resursa = mysqli_query($db, $sql);
                while ($row = mysqli_fetch_array($resursa))
                {
                    ?>
                    <tr>
                        <td align="center">

                            <?php

                                // check if exist an image with name $id_carte.jpg
                                // if doesn't exist replace with a div style with grey color in the background
                                $adresaImagine = "coperta" . $row['id_carte'] . ".jpg";
                                if (file_exists($adresaImagine))
                                {
                                    print '<img src="' . $adresaImagine . '" width="75" height="100"><br>';
                                }
                                else
                                {
                                    print '<div style="width: 75px; height: 100px; border: 1px black solid; background-color: #cccccc">'._("Fara imagine").'</div>';
                                }
                            ?>
                        </td>
                        <td>
                            <b>
                                <!-- make a link to that book -->
                                <a href="carte.php?id_carte=<?php print $row['id_carte'] ?>"><?php print $row['titlu'] ?></a>
                            </b>
                            <!-- print the author and the price of the book -->
                            <br><i><?php echo _("de"); ?> <?php print $row['nume_autor'] ?></i>
                            <br><?php echo _("Pret:"); ?> <?php print $row['pret'] ?> lei
                        </td>
                    </tr>
                    <?php
                }
            ?>
        </table>
    </td>

<?php
    include("page_bottom.php");
?>