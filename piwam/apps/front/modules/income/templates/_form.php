<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form
    action="<?php echo url_for('@income_'.($form->getObject()->isNew() ? 'create' : 'update?id='.$form->getObject()->getId())) ?>"
    method="post"
    <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif ?>

    <table class="formtable">
        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo $form->renderHiddenFields() ?>
                    <?php echo link_to('Annuler', '@incomes_list', array('class'	=> 'blue button')) ?>

                    <?php if (!$form->getObject()->isNew()): ?>
                        <?php echo link_to('Supprimer', '@income_delete?id=' . $form->getObject()->getId(), array('class'	=> 'blue button', 'method' => 'delete', 'confirm' => 'Êtes vous sûr ?')) ?>
                   	<?php endif ?>

                      <input type="submit" value="Sauvegarder" class="blue button" /></td>
            </tr>
        </tfoot>
        <tbody>
        <?php echo $form->renderGlobalErrors() ?>
            <tr>
                <th>Libellé</th>
                <td><?php echo $form['label'] ?> <?php echo $form['label']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th>Montant</th>
                <td><?php echo $form['amount'] ?> &euro; <?php echo $form['amount']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th>Compte affecté</th>
                <td><?php echo $form['account_id'] ?> <?php echo $form['account_id']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th>Activité</th>
                <td><?php echo $form['activity_id'] ?> <?php echo $form['activity_id']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th><?php echo $form['date']->renderLabel() ?></th>
                <td><?php echo $form['date'] ?> <?php echo $form['date']->renderError() ?>
                </td>
            </tr>
            <tr>
                <th>Perçue</th>
                <td><?php echo $form['received'] ?></td>
            </tr>
        </tbody>
    </table>
</form>
