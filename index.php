<?php
include ("connect_db.php");
include ("page_top.php");
include ("menu.php");
?>

    <td valign="top">
    <h1>Prima pagina</h1>
    <b>Cele mai noi carti</b>
    <table cellpadding="5">
        <tr>

            <?php
            $sql = "SELECT carti.id_carte, autori.id_autor, data, titlu, nume_autor, pret FROM carti, autori WHERE carti.id_autor=autori.id_autor ORDER BY data DESC LIMIT 0,3";
            $resursa = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($resursa))
            {
                /*deschidem celula tabelului html*/
                print '<td align="center">';
                $adresaImagine = "coperte".$row['id_carte'].".jpg";
                if(file_exists($adresaImagine))
                {
                    print '<img src="'.$adresaImagine.'" width="75" height="100"><br>';
                }
                else
                {
                    print '<div style="width: 75px; height: 100px; border: 1px black solid; background-color: #cccccc">Fara Imagine</div>';
                }
                print '<b><a href="carte.php?id_carte='.$row['id_carte'].'">'.$row['titlu'].'</a></b><br> de <i>'.$row['nume_autor'].'</i><br> Pret: '.$row['pret'].'lei</td>';
            }
            ?>
        </tr>
    </table>
    <hr>
    <b>Cele mai populare carti</b>
    <table cellpadding="5">
        <tr>
<?php
$sqlVanzari = "SELECT carti.id_carte, sum(nr_buc) AS bucatiVandute FROM vanzari, carti GROUP BY carti.id_carte ORDER BY bucatiVandute DESC LIMIT 0,3";
$resursaVanzari = mysqli_query($db ,$sqlVanzari);
while($rowVanzari = mysqli_fetch_array($resursaVanzari))
{
    $sqlCarte = "SELECT titlu, nume_autor, pret FROM carti, autori WHERE carti.id_autor=autori.id AND id=".$rowVanzari['id'];
    $resursaCarte = mysqli_query($db ,$sqlCarte);
    while($rowCarte = mysqli_fetch_array($resursaCarte))
    {
        print "Am gasit ceva?";

        print '<td align = "center">';
        $adresaImagine = "coperte/".$rowVanzari['id_carte'].".jpg";
        if(file_exists($adresaImagine))
        {
            print '<img src = "'.$adresaImagine.'" width="75" height="100"><br>';
        }
        else
        {
            print '<div style="width: 75px; height: 110px; border: 1px black solid; background-color:#cccccc">Fara imagine</div>div>';
        }
        print '<b><a href = "carte.php?id_carte = '.$rowVanzari['id_carte'].'">'.$rowCarte['titlu'].'</a></b><br> de <i>'.$rowCarte['nume_autor'].'</i><br>Pret: '.$rowCarte['pret'].' lei </td>';
    }
}
?>
        </tr>
    </table>
    </td>
</tr>
</table>

<?php
include("page_bottom.php");
?>

