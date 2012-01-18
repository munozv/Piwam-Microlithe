<?php
/*
 * This page is displayed by index.php if 'cache' folder doesn't
 * exist of is not writable
 */
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="shortcut icon" href="/favicon.ico" />
        <title>Piwam : Une erreur ça arrive toujours...</title>
        <style type="text/css">
            body {
                font-family: helvetica, verdana, arial;
                font-size: 1em;
            }

            div#main {
                padding-top: 50px;
                margin: auto;
                width: 500px;
            }

            h1 {
                background-color: #FF5340;
                color: white;
                padding: 5px;
                font-size: 2.4em;
            }

            .verbatim {
                font-family: courier;
                color: #999;
            }
        </style>
    </head>
    <body>
        <div id="main">
            <h1>Oups, on dirait qu'il y a une erreur...</h1>

            <p>
                Votre répertoire <span class="verbatim">cache</span> n'est pas
                inscriptible. Avec votre client FTP, attribuez des droits en
                écriture sur le répertoire <span class="verbatim">cache</span>.
            </p>
            <p>
                En ligne de commande, cela correspond à la ligne suivante :
            </p>
            <p class="verbatim">
                &gt; user@host: chmod 777 cache
            </p>
            <p>
                Vous pouvez aussi demander de l'aide sur le
                <a href="http://groups.google.fr/group/piwam">groupe du projet</a>.
            </p>
        </div>
    </body>
</html>