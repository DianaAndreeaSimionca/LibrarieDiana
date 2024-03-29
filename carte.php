<?php
    // start the session
    session_start();
    include("connect_db.php");
    include("page_top.php");
    include("menu.php");

    // get the id of a book and get the book from database using that string
    $id_carte = $_GET['id_carte'];
    $sql      = "SELECT * FROM carti, autori WHERE carti.id_carte = " . $id_carte . " AND carti.id_autor = autori.id_autor";
    $resursa  = mysqli_query($db, $sql);
    $row      = mysqli_fetch_array($resursa);
?>

<td valign="top">
    <table>
        <tr>
            <td valign="top">
                <?php
                    // check if exist an image with name $id_carte.jpg
                    // if doesn't exist replace with a div style with grey color in the background
                    $adresaImagine = "coperte/" . $id_carte . ".jpg";
                    if (file_exists($adresaImagine))
                    {
                        print '<img src = "' . $adresaImagine . '" width="75" height="100" hspace="10"><br>';
                    }
                    else
                    {
                        print '<div style="width: 75px; height: 100px; border: 1px black solid; background-color: #cccccc">'._("Fara imagine").'</div>';
                    }
                ?>
            </td>
            <td valign="top">
                <!--present the book to the user using html tags-->
                <h1><?= $row['titlu'] ?></h1>
                <i>de <b><?= $row['nume_autor'] ?>
                    </b>
                </i>
                <p><i><?= $row['descriere'] ?>
                    </i>
                </p>
                <p><?php echo _("Pret:").$row['pret'] ?> lei</p>
            </td>
        </tr>
    </table>
    <!-- make a form if user decide to buy the book -->
    <form action="shopping_cart.php?actiune=adauga" method="post">
        <input type="hidden" name="id_carte" value="<?= $id_carte ?>">
        <input type="hidden" name="titlu" value="<?= $row['titlu'] ?>">
        <input type="hidden" name="nume_autor" value="<?= $row['nume_autor'] ?>">
        <input type="hidden" name="pret" value="<?= $row['pret'] ?>">
        <input type="submit" value="<?php echo _("Cumpara acum!"); ?>">
    </form>

    <p><b><?php echo _("Opiniile cititorilor"); ?></b></p>
    <?php
        // get all the comments for that book
        $sqlComentarii     = "SELECT * FROM comentarii WHERE id_carte = " . $id_carte;
        $resursaComentarii = mysqli_query($db, $sqlComentarii);

        // show all the comments to user
        while ($row = mysqli_fetch_array($resursaComentarii))
        {
            print '<div style="width: 400px; border: 1px solid #ffffff; background-color: #F9F1E7; padding: 5px;"><a href = "mailto:' . $row['email_utilizator'] . '">' . $row['nume_utilizator'] . '</a><br>' . $row['comentariu'] . '</div>';
        }
    ?>

    <br>
    <div style="width: 400px; border:1px solid #632415; background-color: #F9F1E7; padding: 5px;">
        <b><?php echo _("Adauga opinia ta:");?></b>
        <hr size="1">
        <!-- make a form if user decide to post a comment about this book -->
        <form action="add_comment.php" method="POST">
            <input type="hidden" name="id_carte" value=" <?php print $id_carte ?>">
            <?php echo _("Nume:");?> <input type="text" name="nume_utilizator">
            <?php echo _("Email:"); ?> <input type="text" name="adresa_email"><br><br>
            <?php echo _("Comentariu:"); ?> <br> <textarea name="comentariu" cols="45"></textarea><br><br>
            <input type="submit" value="<?php echo _("Adauga"); ?>" align="center">
        </form>
    </div>
</td>

<?php
    include("page_bottom.php");
?>



