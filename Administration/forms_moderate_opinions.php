<?php
    // include the authorization
    include("authorization.php");
    include("admin_top.php");

    // verify if modifica is set
    if (isset($_POST['modifica']))
    {
        $sql     = "SELECT * FROM comentarii WHERE id_comentariu=" . $_POST['id_comentariu'];
        $resursa = mysqli_query($db, $sql);
        $row     = mysqli_fetch_array($resursa);
        ?>
        <h1>Modifica</h1>
        <b>Modifica acest comentariu</b>
        <form action="process_moderate_comments.php" method="post">
            Nume: <input type="text" name="nume_utilizator" value="<?= $row['nume_utilizator'] ?>">
            Email: <input type="text" name="adresa_email" value="<?= $row['email_utilizator'] ?>"><br><br>
            Comentariu: <br><textarea name="comentariu" cols="45" rows="8"><?= $row['comentariu'] ?></textarea><br><br>
            <input type="hidden" name="id_comentariu" value="<?= $_POST['id_comentariu'] ?>">
            <input type="submit" name="modifica" value="Modifica">
        </form>
        <?php
    }//if

    // verify if "sterge" is set
    if (isset($_POST['sterge']))
    {
        ?>
        <h1>Sterge</h1>
        Esti sigur ca vrei sa stergi acest comentariu?
        <form action="process_moderate_comments.php" method="post">
            <input type="hidden" name="id_comentariu" value="<?= $_POST['id_comentariu'] ?>">
            <input type="submit" name="sterge" value="Sterge">
        </form>
        <?php
    }//if

    if (isset($_POST['seteaza_moderate']))
    {
        ?>
        <h1>Seteaza comentariile ca fiind moderate</h1>
        Esti sigur ca vrei sa setezi comentariile din pagina precedenta ca fiind moderate? Le-ai verificat pe toate?
        <form action="process_moderate_comments.php" method="post">
            <input type="hidden" name="ultimul_id" value="<?= $_POST['ultimul_id'] ?>">
            <input type="submit" name="seteaza_moderate" value="Da!">
        </form>
        <?php
    }//if
?>
</body>
</html>

