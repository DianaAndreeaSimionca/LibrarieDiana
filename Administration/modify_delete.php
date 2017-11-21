<?php
include ("authorization.php");
include ("admin_top.php");
?>

<h1>Modificare sau stergere</h1>
<p>
    <b>Nota:</b>
    Nu veti putea sterge domenii care au carti in ele. Inainte de a sterge domeniul, modificati cartile din el astefel incat sa apartina altor domenii.
    De asemenea nu veti putea sterge un autor daca exista carti in baza de date care au acel autor.
</p>
<b>Selecteaza domeniul ce doresti sa il modifici sau stergi:</b>
<form action="forms_modify_delete.php" method="post">
    Domeniu:<select name="id_domeniu">
        <?php
        $sql = "SELECT * FROM domenii ORDER BY  nume_domeniu ASC ";
        $resursa = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($resursa))
        {
            print '<option value="'.$row['id_domeniu'].'">'.$row['nume_domeniu'].'</option>';
        }
        ?>
    </select>
    <input type="submit" name="modifica_domeniu" value="Sterge">
</form>



<b>Selecteaza autorul ce doresti sa il modifici sau stergi:</b>
<form action="forms_modify_delete.php" method="post">
    Autor:<select name="id_autor">
        <?php
        $sql = "SELECT * FROM autori ORDER BY  nume_autor ASC ";
        $resursa = mysqli_query($db, $sql);
        while ($row = mysqli_fetch_array($resursa))
        {
            print '<option value="'.$row['id_autor'].'">'.$row['nume_autor'].'</option>';
        }
        ?>
    </select>
    <input type="submit" name="modifica_autor" value="Modifica">
    <input type="submit" name="sterge_autor" value="Sterge">
</form>

<b>Selecteaza autorul si scrie titlul cartii ce doresti sa o modifici sau stergi:</b>

<form action="forms_modify_delete.php" method="post">
    <table>
        <tr>
            <td>Autor:</td>
            <td>
                <select name="id_autor">
                    <?php
                    $sql = "SELECT * FROM autori ORDER BY  nume_autor ASC ";
                    $resursa = mysqli_query($db, $sql);
                    while ($row = mysqli_fetch_array($resursa))
                    {
                        print '<option value="'.$row['id_autor'].'">'.$row['nume_autor'].'</option>';
                    }
                    ?>
                </select>
            </td>
        </tr>
        <tr>
            <td>Titlu:</td>
            <td>
                <input type="text" name="titlu">
            </td>
        </tr>
    </table>
    <input type="submit" name="modifica_carte" value="Modifica">
    <input type="submit" name="sterge_carte" value="Sterge">

</form>
</body>
</html>