<!DOCTYPE html>
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-2">
	<title>Libraria mea</title>
</head>
<body>

	<h1>Libraria mea</h1>

	<?php
	$db = mysqli_connect("127.0.0.1", "root", "Porsche1996");
	mysqli_select_db($db,"librarie");
	$sql1 = "Select * from carti";
	$resursa1 = mysqli_query($db, $sql1);
	$nr = mysqli_num_rows($resursa1);
	print "<p>Sunt $nr carti in baza de date</p>";
	?>

	<h2>Domenii</h2>

	<?php
	/* si in continuare afisam numele de domenii: */
	$sql2 = "select nume_domeniu FROM domenii";
	$resursa2 = mysqli_query($db, $sql2);
	while($row = mysqli_fetch_array($resursa2))
	{
		print '<a href="domeniu.php?nume_domeniu='.$row['nume_domeniu'].'">'.$row['nume_domeniu'].'</a></br>';
	}
	?>

</body>
</html>