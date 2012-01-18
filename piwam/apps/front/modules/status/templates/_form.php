<?php include_stylesheets_for_form($form) ?>
<?php include_javascripts_for_form($form) ?>

<form
  action="<?php echo url_for('@status_'.($form->getObject()->isNew() ? 'create' : 'update?id='.$form->getObject()->getId())) ?>"
  method="post"
  <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

  <?php if (!$form->getObject()->isNew()): ?>
    <input type="hidden" name="sf_method" value="put" />
  <?php endif ?>

  <table class="formtable">

      <!-- Form's buttons -->

      <tfoot>
          <tr>
              <td colspan="2">
                <?php echo $form->renderHiddenFields() ?>
                <?php echo link_to('Annuler', 'statut/index', array('class'	=> 'blue button')) ?>

                <?php if (!$form->getObject()->isNew()): ?>
                    <?php echo link_to('Supprimer', 'statut/delete?id='.$form->getObject()->getId(), array('method' => 'delete', 'confirm' => 'Ètes vous sûr ?', 'class' => 'blue button')) ?>
              	<?php endif ?>

                <input class="blue button" type="submit" value="Enregistrer" />
              </td>
          </tr>
      </tfoot>


      <!-- Form's widgets -->

      <tbody>
      <?php echo $form->renderGlobalErrors() ?>
          <tr>
              <th><?php echo $form['label']->renderLabel() ?> :</th>
              <td><?php echo $form['label'] ?> <?php echo $form['label']->renderError() ?></td>
          </tr>
      </tbody>
  </table>
</form>
