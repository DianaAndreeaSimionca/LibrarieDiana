<?php
    include("authorization.php");
    include("admin_top.php");
?>

<h1>Modificare sau stergere comentarii utilizatori</h1>
<b>Comentariile utilizatorilor de la ultima moderare</b>

<?php
    $sql        = "SELECT * FROM comentarii, admin, carti, autori WHERE id_comentariu>admin.ulimul_comentariu_moderat AND carti.id_carte=comentarii.id_carte AND carti.id_autor=autori.id_autor ORDER BY id_comentariu ASC ";
    $resursa    = mysqli_query($db, $sql);
    $ultimul_id = 0;
    while ($row = mysqli_fetch_array($resursa))
    {
        if ($ultimul_id < $row['id_comentariu'])
        {
            $ultimul_id = $row['id_comentariu'];
        }

        ?>
        <form action="forms_moderate_opinions.php" method="post">
            <div style="width: 500px; border: 1px solid #ffffff; background-color: #F9F1E7; padding: 5px">
                <b><?= $row['titlu'] ?></b> de <?= $row['nume_autor'] ?>
                <hr size="1">
                <a href="mailto:<?= $row['email_utilizator'] ?>"><?= $row['nume_utilizator'] ?></a><br>
                <p><?php print $row['comentariu'] ?></p>
            </div>
            <input type="hidden" name="id_comentariu" value="<?= $row['id_comentariu'] ?>">
            <input type="submit" name="modifica" value="Modifica">
            <input type="submit" name="sterge" value="Sterge">
        </form>
        <?php
    }
    $nrComentarii = mysqli_num_rows($resursa);
    if ($nrComentarii > 0)
    {
        ?>
        <form action="forms_moderate_opinions.php" method="post">
            <input type="hidden" name="ultimul_id" value="<?= $ultimul_id ?>">
            <input type="submit" name="seteaza_moderate" value="Setteaza aceste comentarii ca fiind moderate">
        </form>
        <?php
    }
    else
    {
        print "<p>Nu exista comentarii noi.</p>";
    }
?>
</body>
</html>

