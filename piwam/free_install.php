<?php
/**
 * This file is creating `cache` and `log` folders for users who are
 * hosting Piwam on free.fr hosting platform.
 * This script will create both directories that you have to remove
 * before.
 *
 * If you're hosting Piwam on a platform which allows you to change
 * chmod manually, you can (and should) remove this file
 */
?>

<html>
  <head>
    <title>Piwam: pour Free.fr</title>
  </head>
  <body>
    <h1>Cr&eacute;ation de r&eacute;pertoires pour Free.fr</h1>
    <pre>
      <?php
      if (@mkdir('cache') && @mkdir('log'))
      {
        echo '[succes] Les r&eacute;petoires ont bien &eacute;t&eacute; cr&eacute;&eacute;s';
      }
      else
      {
        echo PHP_EOL;
        echo "[erreur] Impossible de cr&eacute;er les r&eacute;pertoires..." . PHP_EOL;
        echo "V&eacute;rifiez qu'un r&eacute;pertoire 'cache' ou 'log' n'existe pas d&eacute;j&agrave;" . PHP_EOL;
        echo "Si c'est le cas, supprimez ces r&eacute;pertoires.";
      }
      ?>
    </pre>
  </body>
</html>