<?php

$db=mysqli_connect("localhost","root","");
mysqli_select_db($db,"librarie");
?>
<table>
    <tr>
        <td>Titlu</td>
    </tr>

<?php

$sql = "SELECT titlu FROM carti";
$resursa = mysqli_query($db,$sql);

while ($row=mysqli_fetch_array($resursa))
{
    print '<tr>
<td>'.$row['titlu'].'</td>
           </tr>';
}

?>
</table>
