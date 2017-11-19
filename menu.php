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
</td>