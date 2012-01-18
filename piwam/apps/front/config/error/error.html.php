<?php
/*
 * Get the file which is not writable, according to a message produced by
 * a sfFileException
 */
function getUnwritableFolder($message)
{
    $a      = explode("\"", $message);
    $file   = $a[1];
    $a      = explode("/", $file);
    $folder = $a[count($a) - 2];

    return $folder;
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="fr" />
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


            <!-- A file/folder is not writable or accessible -->

            <?php if (get_class($exception) == 'sfFileException'): ?>
                <?php
                    $folder = getUnwritableFolder($exception->getMessage())
                ?>
                <p>
                    Votre répertoire <span class="verbatim"><?php echo $folder ?>
                    </span> n'est pas inscriptible. Avec votre client FTP,
                    attribuez des droits en écriture sur le répertoire
                    <span class="verbatim"><?php echo $folder ?></span>.
                </p>
                <p>
                    En ligne de commande, cela correspond à la ligne suivante :
                </p>
                <p class="verbatim">
                    &gt; user@host: chmod 777 <?php echo $folder ?>
                </p>


            <!-- MySQL connection error -->

            <?php elseif (get_class($exception) == 'PropelException'): ?>
                <p>
                    Erreur de connexion au serveur MySQL. Si vous êtes en train
                    de mettre à jour Piwam, peut être n'avez-vous pas remis en
                    place votre ancien fichier <span class="verbatim">
                    /config/databases.yml</span>
                </p>
                <p>
                    Vous pouvez aussi essayer de <a href="association/logout">
                    vous déconnecter</a>
                </p>


            <!-- Another unknown error -->

            <?php else: ?>
                <p>
                    L'erreur suivante est survenue :<br /><br />
                    Message : <span class="verbatim"><?php echo $exception->getMessage() ?></span><br /><br />
                    Détails : <span class="verbatim"><?php echo nl2br($exception) ?></span>
                </p>
            <?php endif; ?>
            <p>
                Vous pouvez aussi demander de l'aide sur le
                <a href="http://groups.google.fr/group/piwam">groupe du projet</a>.
            </p>
        </div>
    </body>
</html>
