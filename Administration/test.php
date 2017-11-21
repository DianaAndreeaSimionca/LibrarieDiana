<?php
include ("f_authorization.php");

if(!autorizat($db))
{
    print 'Acces neautorizat!';
    exit;
}

include ("menu.php");
include ("main.php");
?>