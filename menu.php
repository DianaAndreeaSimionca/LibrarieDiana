<td valign="top" width="125">
    <div style="width:120px; background-color:#F9F1E7; padding:4px; border: solid #632415 1px">
        <b>Alege domeniul</b><HR size="1">
<?php
$sql = "SELECT nume_domeniu FROM domenii ORDER BY nume_domeniu ASC";
$resursa = mysqli_query($db, $sql);
while($row = mysqli_fetch_array($resursa))
{
    print '<a href="domain.php?nume_domeniu='.$row['nume_domeniu'].'">'.$row['nume_domeniu'].'</a><br>';
}

?>

</div>
<br>
<div style="width:120px; background-color:#F9F1E7; padding:4px; border:solid #632415 1px">
	<form action="search.php" method="GET">
	<b>Cautare</b><br>
        <input type="text" name="cuvant" size="12"><br>
	<input type="submit" value="Cauta">
	</form>
</div>
    <br>
    <div style="width: 120px; background-color: #F9F1E7; padding: 4px; border: solid #632415 1px">
        <b>Cos</b><br>

        <?php
        $nrCarti = 0;
        $totalValoare = 0;

        for ($i=0; $i<count($_SESSION['titlu']); $i++)
        {
            $nrCarti = $nrCarti + $_SESSION['nr_buc'][$i];
            $totalValoare = $totalValoare + ($_SESSION['nr_buc'][$i] * $_SESSION['pret'][$i]);
        }
        ?>

        Aveti <b><?=$nrCarti?></b> carti in cos, in valoare totala de <b><?=$totalValoare?></b> lei.
        <a href="shopping_cart.php">Click aici pentru a vedea continutul cosului!</a>
    </div>
</td>