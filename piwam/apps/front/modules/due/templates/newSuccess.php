<h2>Enregistrer une cotisation</h2>

<?php if ($sf_user->hasFlash('notice')): ?>
<?php echo '<p class="notice">' . $sf_user->getFlash('notice') . '</p>' ?>
<?php endif; ?>

<?php include_partial('form', array('form' => $form)) ?>
