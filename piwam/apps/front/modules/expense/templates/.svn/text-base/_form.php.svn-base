<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form
    action="<?php echo url_for('@expense_'.($form->getObject()->isNew() ? 'create' : 'update?id='.$form->getObject()->getId())) ?>"
    method="post"
    <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif ?>

    <table class="formtable">

        <!-- Form footer, displays buttons -->

        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields() ?>
                    <?php echo link_to('Annuler', '@expenses_list', array('class'	=> 'blue button')) ?>

                    <?php if (!$form->getObject()->isNew()): ?>
                        <?php echo link_to('Supprimer', '@expense_delete?id=' . $form->getObject()->getId(), array('class' => 'blue button', 'method' => 'delete', 'confirm' => 'Êtes vous sûr ?')) ?>
                    <?php endif ?>

                    <input type="submit" value="Sauvegarder" class="blue button" />
                </td>
            </tr>
        </tfoot>


        <!-- Form body, displays fields -->

        <tbody>
        <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th><?php echo $form['label']->renderLabel() ?> :</th>
                <td><?php echo $form['label'] ?> <?php echo $form['label']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['amount']->renderLabel() ?></th>
                <td><?php echo $form['amount'] ?> &euro; <?php echo $form['amount']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['account_id']->renderLabel() ?> :</th>
                <td><?php echo $form['account_id'] ?> <?php echo $form['account_id']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['activity_id']->renderLabel() ?> :</th>
                <td><?php echo $form['activity_id'] ?> <?php echo $form['activity_id']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['date']->renderLabel() ?> :</th>
                <td><?php echo $form['date'] ?> <?php echo $form['date']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['paid']->renderLabel() ?></th>
                <td><?php echo $form['paid'] ?></td>
            </tr>
        </tbody>
    </table>
</form>
