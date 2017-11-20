<?php
include ("f_authorization.php");

if(!autorizat())
{
    print 'Acces neautorizat!';
    exit;
}

include ("menu.php");
include ("main.php");
?>