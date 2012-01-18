<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form action="<?php echo url_for('@activity_'.($form->getObject()->isNew() ? 'create' : 'update?id='.$form->getObject()->getId())) ?>"
    method="post"
    <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif ?>


    <table class="formtable">

        <!-- Footer : buttons -->

        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields() ?>
                    <?php echo link_to('Annuler', '@activities_list', array('class'	=> 'blue button')) ?>

                    <?php if (! $form->getObject()->isNew()): ?>
                        <?php echo link_to('Supprimer', '@activity_delete?id=' . $form->getObject()->getId(), array('class' => 'blue button', 'method' => 'delete', 'confirm' => 'Etes vous sûr ?')) ?>
                    <?php endif ?>

                  <input type="submit" value="Sauvegarder" class="blue button" />
                </td>
            </tr>
        </tfoot>

        <!-- Widgets -->

        <tbody>
            <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th>Libellé :</th>
                <td><?php echo $form['label'] ?> <?php echo $form['label']->renderError() ?></td>
            </tr>
        </tbody>
    </table>
</form>
