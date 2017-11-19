<?php
include("connect_db.php");
include("page_top.php");
include("menu.php");

$numeDomeniu = $_GET['nume_domeniu'];
?>

<td align="top">
    <h1>Domeniu: <?php print $numeDomeniu ?></h1>
    <b>Carti in domeniul
        <u><i><?php print $numeDomeniu ?></i></u>:
    </b>
    <table cellpadding="5">
        <?php
            $sql = "select * FROM carti AS c, autori AS a, domenii AS d WHERE c.id_domeniu=d.id AND c.id_autor=a.id AND d.nume_domeniu='".$numeDomeniu."'";
            $resursa = mysqli_query($db, $sql);
            while($row = mysqli_fetch_array($resursa))
            {
                ?>
                <tr>
                    <td align="center">

                        <?php
                        $adresaImagine = "coperta".$row['id'].".jpg";
                        if(file_exists($adresaImagine))
                        {
                            print '<img src="'.$adresaImagine.'" width="75" height="100"><br>';
                        }
                        else
                        {
                            print '<div style="width: 75px; height: 100px; border: 1px black solid; background-color: #cccccc">Fara imagine</div>';
                        }
                        ?>
                    </td>
                    <td>
                        <b>
                            <a href="carte.php?id_carte=<?php print $row['id']?>"><?php print $row['titlu'] ?></a>
                        </b>
                        <br><i>de <?php print $row['nume_autor'] ?></i>
                        <br>Pret: <?php print $row['pret'] ?> lei
                    </td>
                </tr>
                <?php
            }
        ?>
    </table>
</td>

<?php
include("page_bottom.php");
?>