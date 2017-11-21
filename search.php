<?php
    session_start();
    include("connect_db.php");
    include("page_top.php");
    include("menu.php");

    $cuvant = $_GET['cuvant'];
?>

<td valign="top">
    <h1>Rezultatele cautarii</h1>
    <p>Textul cautat: <b><?= $cuvant ?></b></p>
    <b>Autori: </b>
    <?php
        $sql     = "SELECT id_autor, nume_autor FROM autori WHERE nume_autor LIKE '%" . $cuvant . "%'";
        $resursa = mysqli_query($db, $sql);

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
    <b>Titluri:</b>

    <?php
        $sql     = "SELECT id_carte, titlu, descriere FROM carti WHERE titlu LIKE '%" . $cuvant . "%'";
        $resursa = mysqli_query($db, $sql);

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
