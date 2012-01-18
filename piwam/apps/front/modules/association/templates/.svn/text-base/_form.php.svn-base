<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@association_' . ($form->getObject()->isNew() ? 'create' : 'update?id=' . $form->getObject()->getId())) ?>"
      method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif ?>

<table class="formtable">

    <!-- Form footer : buttons -->

    <tfoot>
        <tr>
            <td>&nbsp;</td>
            <td>
                <?php echo $form->renderHiddenFields() ?>
                <?php echo link_to('Annuler', '@members_list', array('class'	=> 'blue button')) ?>

                <!-- Display "next step" or "cancel" and "delete" buttons-->

                <?php if ($form->getObject()->isNew()): ?>
                    <input type="submit" value="Étape suivante >" class="blue button" />
                <?php else: ?>
                    <?php echo link_to('Supprimer', '@association_delete?id=' . $form->getObject()->getId(), array('class' => 'blue button', 'method' => 'delete', 'confirm' => 'Êtes vous sûr ?')) ?>
                    <input type="submit" value="Sauvegarder" class="blue button" name="Sauvegarder" />
                <?php endif ?>

            </td>
        </tr>
    </tfoot>


    <!-- Form widgets -->

    <tbody>
        <?php if ($form->hasGlobalErrors()): ?>
        <tr>
            <td colspan="2">
                <div class="error"><?php $form->renderGlobalErrors() ?></div>
            </td>
        </tr>
        <?php endif ?>
        <tr>
            <th><?php echo $form['name']->renderLabel() ?> :</th>
            <td><?php echo $form['name'] ?> <?php echo $form['name']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['description']->renderLabel() ?> :</th>
            <td><?php echo $form['description'] ?> <?php echo $form['description']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['website']->renderLabel() ?> :</th>
            <td><?php echo $form['website'] ?> <?php echo $form['website']->renderError() ?></td>
        </tr>


        <!-- Display a checkbox to warn Piwam's author -->

        <?php if ($form->getObject()->isNew()): ?>
            <tr>
                <th><?php echo $form['ping_piwam']->renderLabel() ?> :</th>
                <td><?php echo $form['ping_piwam'] ?> Dire à l'auteur que mon association utilise Piwam</td>
            </tr>
        <?php endif ?>

    </tbody>
</table>
</form>
