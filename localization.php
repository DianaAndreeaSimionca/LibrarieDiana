<?php
    /**
     * Created by PhpStorm.
     * User: nascasergiualin
     * Date: 17/02/2018
     * Time: 09:41
     */

    function setLanguage()
    {
        $lang = "ro_RO";

        if (isset($_GET['lang']))
        {
            // Set language to German
            // get the language from get method

            $lang = $_GET['lang'];
        }
        else if(isset($_SESSION['lang']))
        {
            // Set language to German
            // get the language from the session
            $lang = $_SESSION['lang'];
        }
        else
        {
            // Set language to German
            // get the language from the http response
            $lang = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
        }

        $lang = "en_US.UTF-8";

        $results = putenv("LC_ALL=$lang");
        if (!$results)
        {
           echo 'Something is wrong with language(putenv)';
        }

        $results = setlocale(LC_ALL, $lang);
        if (!$results)
        {
            echo 'Something is wrong with language(setlocale)';
        }

        $results = bindtextdomain("librarie", __DIR__ . "/locale");
        if (!$results)
        {
            echo 'Something is wrong with language(bindtextdomain)';
        }

        $results = textdomain('librarie');
        if (!$results)
        {
            echo 'Something is wrong with language(textdomain)';
        }
    }

?>
