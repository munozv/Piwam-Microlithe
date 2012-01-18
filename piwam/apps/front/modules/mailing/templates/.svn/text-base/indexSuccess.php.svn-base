<?php use_javascript('tiny_mce/tiny_mce.js') ?>

<h2>Envoi en masse</h2>

<!-- Display success or error message -->

<?php if ($sf_user->hasFlash('notice')): ?>
    <p class="notice"><?php echo $sf_user->getFlash('notice') ?></p>
<?php endif ?>

<?php if ($sf_user->hasFlash('error')): ?>
    <p class="error">
        <?php echo image_tag('error', array('align' => 'top', 'alt' => 'Erreur')) ?> <strong>ERREUR</strong>:
        <?php echo $sf_user->getFlash('error') ?>
    </p>
<?php endif ?>


<!-- Display sent mail if form has been submit -->

<?php  if (isset($content)): ?>

    <div class="mailPreview">
        <p><strong>Votre message :</strong></p>
        <hr />
        <?php echo html_entity_decode($content) ?>
    </div>

<?php else: ?>

    <form action="<?php echo url_for('mailing/index') ?>" method="post">
    <table class="formtable" title="mailing">

        <!-- if message or subject is empty -->

        <?php if ($form->hasErrors()): ?>
            <tr>
                <td colspan="2">
                    <div class="error">
                        <?php echo image_tag('error', array('alt' => '[Erreur]', 'align' => 'top')) ?>
                        ERREUR : Vous devez entrer un sujet et un message
                    </div>
                </td>
            </tr>
        <?php endif ?>

        <tr>
            <th><?php echo $form['subject']->renderLabel() ?></th>
            <td><?php echo $form['subject'] ?></td>
        </tr>
        <tr>
            <th>Destinataires</th>
            <td>Tout le monde</td>
        </tr>
        <tr>
            <th valign="top"><?php echo $form['mail_content']->renderLabel() ?></th>
            <td><?php echo $form['mail_content'] ?></td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class="grey button" value="Envoyer" /></td>
        </tr>
    </table>
    </form>

<?php endif ?>