<?php
    /**
     * Created by PhpStorm.
     * User: nascasergiualin
     * Date: 17/02/2018
     * Time: 09:41
     */

    function setLanguage()
    {
        if(isset($_GET['lang']))
        {
            // Set language to German
            putenv('LC_ALL=de_DE');
            setlocale(LC_ALL, 'de_DE');

            bindtextdomain("librarie", "./locale");
            textdomain("librarie");
        }
        else if(isset($_SESSION['lang']))
        {
            // Set language to German
            putenv('LC_ALL=de_DE');
            setlocale(LC_ALL, 'de_DE');

            bindtextdomain("librarie", "./locale");
            textdomain("librarie");
        }
        else
        {
            $locale = Locale::acceptFromHttp($_SERVER['HTTP_ACCEPT_LANGUAGE']);
            // Set language to German
            putenv('LC_ALL=de_DE');
            setlocale(LC_ALL, 'de_DE');

            bindtextdomain("librarie", "./locale");
            textdomain("librarie");
        }

        
        $results = putenv("LC_ALL=en_US");
        if (!$results)
        {
            exit ('putenv failed');
        }

        $results = setlocale(LC_ALL, 'en_US');
        if (!$results)
        {
            exit ('setlocale failed: locale function is not available on this platform, or the given local does not exist in this environment');
        }

        $results = bindtextdomain("librarie", __DIR__ . "/locale");
        echo 'new text domain is set: ' . $results. "\n";

        $results = textdomain('librarie');
        echo 'current message domain is set: ' . $results. "\n";

        echo _('Buna');
    }

?>
