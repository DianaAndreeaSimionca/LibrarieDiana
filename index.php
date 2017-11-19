<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
	<title>Libraria mea</title>
</head>
<body>

    // al doilea init


    // Buna Iubitul meu drag si scump heii trebuia sa spui iubita mea scumpa si draga si frumoasa
  
	<h1>Libraria mea</h1>
	<?php
	$db = mysqli_connect("localhost", "root", "Porsche1996");
	mysqli_select_db($db,"librarie");
	$sql1 = "Select * from carti";
	$resursa1 = mysqli_query($db, $sql1);
	$nr = mysqli_num_rows($resursa1);
	print "<p>Sunt $nr carti in baza de date</p>";
	?>

	<h2>Domenii</h2>

	<?php
	/* si in continuare afisam numele de domenii: */
	/*$sql2 = "select nume_domeniu FROM domenii";
	$resursa2 = mysql_query($sql2);
	while($row = mysql_fetch_array($resursa2))
	{
		print $row['nume_domeniu']."<br>";
		print '<a href="domeniu.php?nume_domeniu='.$row['nume_domeniu'].'">'.$row['nume_domeniu'].'</a></br>';
	}*/
	?>

</body>
</html>