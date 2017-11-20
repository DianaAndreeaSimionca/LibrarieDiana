<?php
include ("authorization.php");
include ("admin_top.php");

if (isset($_POST['modifica_domeniu']))
{
    $sql = "SELECT nume_domeniu FROM domenii WHERE id_domeniu='".$_POST['id_domeniu']."'";
    $resursa = mysqli_query($db, $sql);
    $nume_domeniu = mysqli_result($resursa, 0, "nume_domeniu");

?>
<h1>Modifica nume domeniu</h1>
<form action="process_modify_delete.php" method="post">

    <input type="text" name="nume_domeniu" value="<?=$nume_domeniu?>">
    <input type="hidden" name="id_domeniu" value="<?=$id_domeniu?>">
    <input type="submit" name="modifica_domeniu" value="Modifica">

</form>

<?php
}

if (isset($_POST))

