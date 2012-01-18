<?php
/*
 * Required parameters :
 *
 * $error
 */
?>

<?php if ($error): ?>

    <strong>
        Fichier non inscriptible
    </strong><br />

    Le fichier <span style="font-family: courier">config/databases.yml</span>
    n'est pas inscriptible

<?php else: ?>

    Le fichier <span style="font-family: courier">config/databases.yml</span>
    est inscriptible

<?php endif; ?>