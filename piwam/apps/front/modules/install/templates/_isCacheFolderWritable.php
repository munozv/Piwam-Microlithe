<?php
/*
 * Required parameters :
 *
 * $error
 */
?>

<?php if ($error): ?>

    <strong>
        Répertoire non inscriptible
    </strong><br />

    Le répertoire <span style="font-family: courier">cache</span> n'est
    pas inscriptible

<?php else: ?>

    Le répertoire <span style="font-family: courier">cache</span> est inscriptible

<?php endif; ?>