<?php
include ("authorization.php");
include ("admin_top.php");

if(isset($_POST['nume_domeniu']))
{
    if ($_POST['nume_domeniu'] == "")
    {
        print "Nu ati introdus numele domeniului";
    }
    else
    {
        $sql = "UPDATE domenii SET nume_domeniu='".$_POST['nume_domeniu']."' WHERE id_domeniu=".$_POST['id_domeniu'];
        mysqli_query($db, $sql);
        print "Numele domeniului a fost modificat!";
    }
}//if

if (isset($_POST['sterge_domeniu']))
{

    $sql = "DELETE FROM domenii WHERE id_domeniu=".$_POST['id_domeniu'];
    mysqli_query($db, $sql);
    print "Domeniul a fost sters!";
}//if

if (isset($_POST['modifica_autor']))
{
    if ($_POST['nume_autor'] == "")
    {
        print "Nu ati introdus numele autorului";
    }
    else
    {
        $sql = "UPDATE autori SET nume_autor='".$_POST['nume_autor']."' WHERE id_autor=".$_POST['id_autor'];
        print "Numele autorului a fost modificat!";
    }
}//if

if (isset($_POST['sterge_autor']))
{

    $sql = "DELETE FROM autori WHERE id_autor=".$_POST['id_autor'];
    mysqli_query($db, $sql);
    print "Autorul a fost sters!";
}//if

if (isset($_POST['modifica_carte']))
{
    if ($_POST['titlu'] == "")
    {
        print "Nu ati introdus titlul!";
    }
    else if ($_POST['descriere'] == "")
    {
        print "Nu ati introdus descrierea!";
    }
    else if ($_POST['pret'] == "")
    {
        print "Nu ati introdus pretul!";
    }
    else if (!is_numeric($_POST['pret']))
    {
        print "Pretul trebuie sa fie numeric! Scrieti <b>1000</b> nu <b>1000 lei</b>";
    }
    else
    {
        $sql = "UPDATE carti SET id_domeniu=".$_POST['id_domeniu'].", id_autor=".$_POST['id_autor'].", titlu='".$_POST['titlu']."', descriere='".$_POST['descriere']."', pret=".$_POST['pret']." WHERE id_carte=".$_POST['id_carte'];
        mysqli_query($db, $sql);
        print "Informatiile au fost modificate!";
    }
}//if

if (isset($_POST['sterge_carte']))
{

    $sqlCarte = "DELETE FROM carti WHERE id_carte=".$_POST['carte'];
    mysqli_query($db, $sqlCarte);
    $sqlComentarii = "DELETE FROM comentarii WHERE id_carte=".$_POST['carte'];
    mysqli_query($db, $sqlComentarii);
    print "Cartea a fost stearsa din baza de date!";
}//if
?>
</body>
</html>
