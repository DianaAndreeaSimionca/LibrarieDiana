<?php

    //include localization php
    include('localization.php');
    setLanguage();

    // connect to MySql database
    $db = mysqli_connect("127.0.0.1", "root", "");
    mysqli_select_db($db, "librarie");

?>