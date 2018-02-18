<?php
    // start the session
    session_start();
    include("connect_db.php");
    include("page_top.php");
    include("menu.php");

    // get the keyword
    $cuvant = $_GET['cuvant'];
?>

<td valign="top">
    <h1><?php echo _("Rezultatele cautarii"); ?></h1>
    <p><?php echo _("Textul cautat:"); ?> <b><?= $cuvant ?></b></p>
    <b><?php echo _("Autori:"); ?> </b>
    <?php
        // get id and name of the authors that contain the keyword
        $sql     = "SELECT id_autor, nume_autor FROM autori WHERE nume_autor LIKE '%" . $cuvant . "%'";
        $resursa = mysqli_query($db, $sql);

        // verify if the rows number is equal to 0
        // if it's equal than it will be shown no result
        // else shows the searched author
        if (mysqli_num_rows($resursa) == 0)
        {
            print "<i>Nici un rezultat</i>";
        }
        else
            print "<br>";
        while ($row = mysqli_fetch_array($resursa))
        {
            print '<a href="autor.php?id_autor=' . $row['id_autor'] . '">' . $row['nume_autor'] . '</a><br>';
        }
    ?>
    <br><br>
    <b><?php echo _("Titluri:"); ?></b>

    <?php

        // get id, title and description of the book searched with keyword
        $sql     = "SELECT id_carte, titlu, descriere FROM carti WHERE titlu LIKE '%" . $cuvant . "%'";
        $resursa = mysqli_query($db, $sql);

        // verify if the rows number is equal to 0
        // if it's equal than it will be shown no result
        // else shows the searched book
        if (mysqli_num_rows($resursa) == 0)
        {
            print "<i>Nici un rezultat</i>";
        }
        else
            print "<br>";
        while ($row = mysqli_fetch_array($resursa))
        {
            print '<a href="carte.php?id_carte=' . $row['id_carte'] . '">' . $row['titlu'] . '</a><br>' . $row['descriere'] . '<br><br>';
        }
    ?>

    <br>
</td>

<?php
    include("page_bottom.php");
?>
