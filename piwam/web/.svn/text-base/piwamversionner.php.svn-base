<?php
/**
 * Mini web-service which is able to quickly say if Piwam is up to date
 * or not according to the $_GET['current'] which referes to the current
 * version of Piwam
 *
 * Returns 'OK' if this is the last version
 */

define('REQUEST_KEY', 'Piwam');

if ((! isset($_GET['auth'])) || ($_GET['auth'] != REQUEST_KEY))
{
    echo "Erreur d'authentification";
    exit ;
}

if (! isset($_GET['current']))
{
    echo "Erreur de paramètres";
    exit ;
}

if ($_GET['current'] == '112')
{
    echo 'OK';
    exit ;
}

echo 'OK';
?>