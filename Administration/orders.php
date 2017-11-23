<?php
include ("authorization.php");
include ("admin_top.php");
?>

<h1>Comenzi</h1>
<b>Comenzi inca neonorate</b>
<?php
$sqlTranzactii = "SELECT id_tranzactie, DATE_FORMAT(data_tranzactie, '%d-%m-%y') AS data_tranzactie, nume_cumparator, adresa_cumparator FROM tranzactii WHERE comanda_onorata=0";
$resursaTranzactii = mysqli_query($db, $resursaTranzactii);
while ($rowTranzactie = mysqli_fetch_array($resursaTranzactii))
{
?>
<form action="process_orders.php" method="post">
    Data comenzii: <b><?=$rowTranzactie['data_tranzactie']?></b>
    <div style="width: 500px; border: 1px solid #ffffff; background-color: #F9F1E7; padding: 5px">
        <b><?=$rowTranzactie['nume_cumparator']?></b><br>
        <?=$rowTranzactie['adresa_cumparator']?>
        <table border="1" cellpadding="4" cellspacing="0">
            <tr>
                <td align="center"><b>Carte</b></td>
                <td align="center"><b>Nr. buc</b></td>
                <td align="center"><b>Pret</b></td>
                <td align="center"><b>Total</b></td>
            </tr>
            <?php
            $sqlCarti = "SELECT titlu, nume_autor, pret, nr_buc FROM vanzari, carti, autori WHERE carti.id_carte=vanzari.id_carte AND carti.id_autor=autori.id_autor AND  id_tranzactie=".$rowTranzactie['id_tranzactie'];
            $resursaCarti = mysqli_query($db, $sqlCarti);
            while ($rowCarte = mysqli_fetch_array($resursaCarti))
            {
                print '<tr><td>'.$rowCarte['titlu'].'de'.$rowCarte['nume_autor'].'</td><td align="right">'.$rowCarte['nr_buc'].'</td><td align="right">'.$rowCarte['pret'].'</td>';
                $total = $rowCarte['pret'] * $rowCarte['nr_buc'];
                print '<tr><td align="right">'.$total.'</td></tr>';
                $totalGeneral = $totalGeneral + $total;
            }//while
            ?>
            <tr>
                <td colspan="3" align="right">Total comanda:</td>
                <td><?=$totalGeneral?> lei</td>
            </tr>
        </table>
        <input type="submit" name="comanda_onorata" value="Comanda onorata">
        <input type="submit" name="anuleaza_comanda" value="Anuleaza comanda">
    </div>
</form>
<?php
}//while
?>
</body>
</html>

