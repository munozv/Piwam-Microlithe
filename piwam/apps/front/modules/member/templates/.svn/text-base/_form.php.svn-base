<?php
include_stylesheets_for_form($form);
include_javascripts_for_form($form);
use_helper('JavascriptBase');
use_javascript('custom-forms/si.files.js')

/**
 * Possible input values:
 * ======================
 *
 *  - $first    : set if we are registering the first user which is himself
 *                registering a new association
 *
 *  - $pending  : set if the form is filled by a user which is requesing
 *                a subscription to an existing association
 */
?>


<!-- To customize "browse" button -->
<script type="text/javascript" language="javascript">
    // <![CDATA[
    SI.Files.stylizeAll();
</script>

<form action="<?php
    	if (isset($first))
    	{
    		echo url_for('@member_first');
    	}
    	elseif (isset($pending))
    	{
            echo url_for('@member_create_pending');
    	}
    	else
    	{
    		echo url_for('@member_' . ($form->getObject()->isNew() ? 'create' : 'update?id=' . $form->getObject()->getId()));
    	}
    	?>"

    method="post" <?php $form->isMultipart() and print 'enctype="multipart/form-data" ' ?>>

    <?php if (!$form->getObject()->isNew()): ?>
        <input type="hidden" name="sf_method" value="put" />
    <?php endif ?>

<table class="formtable">

    <!-- Form footer which display buttons -->

    <tfoot>
        <tr>
            <td colspan="2">
                <?php echo $form->renderHiddenFields() ?>

                <!-- Cancel button only if this is not the first member -->

                <?php if (! isset($first)): ?>
                        <?php echo link_to('Annuler', '@members_list', array('class' => 'blue button')) ?>
                <?php endif ?>



                <!-- Delete button only if object already exists -->

                <?php if (! $form->getObject()->isNew()): ?>
	                	<?php echo link_to('Supprimer', '@member_delete?id=' . $form->getObject()->getId(), array('class' => 'blue button', 'method' => 'delete', 'confirm' => 'Etes vous sûr ?')) ?>
        		    <?php endif ?>



                <!-- Submit button value according to the state -->

        		    <?php if ((isset($first)) && ($first)): ?>
                    <input type="submit" value="Étape suivante >" class="blue button" />
                <?php else: ?>
                    <input type="submit" value="Sauvegarder" class="blue button" />
                <?php endif ?>

            </td>
        </tr>
    </tfoot>


    <tbody>
    <?php echo $form->renderGlobalErrors() ?>
        <tr>
            <th><?php echo $form['lastname']->renderLabel() ?>*</th>
            <td><?php echo $form['lastname'] ?><?php echo $form['lastname']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['firstname']->renderLabel() ?>*</th>
            <td><?php echo $form['firstname'] ?><?php echo $form['firstname']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['username']->renderLabel() ?> <?php echo ($form->isFirstRegistration()) ? '*' : ''; ?></th>
            <td><?php echo $form['username'] ?><?php echo $form['username']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['password']->renderLabel() ?> <?php echo ($form->isFirstRegistration()) ? '*' : ''; ?></th>
            <td><?php echo $form['password'] ?><?php echo $form['password']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['status_id']->renderLabel() ?></th>

            <!-- This field can be disabled, that why we may have
                 to display a fake (disabled) widget (real widget
                 will be hidden) -->
            
            <?php if (isset($form['fake_status_id'])): ?>
              <td><?php echo $form['fake_status_id'] ?></td>
            <?php else: ?>
              <td><?php echo $form['status_id'] ?><?php echo $form['status_id']->renderError() ?></td>
            <?php endif ?>
        </tr>
        <tr>
            <th><?php echo $form['picture']->renderLabel() ?></th>
            <td><label class="custom"><?php echo $form['picture'] ?><?php echo $form['picture']->renderError() ?></label></td>
        </tr>
        <tr>
            <th><?php echo $form['subscription_date']->renderLabel() ?></th>
            <td><?php echo $form['subscription_date'] ?><?php echo $form['subscription_date']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['due_exempt']->renderLabel() ?></th>

            <!-- This field can be disabled, that why we may have
                 to display a fake (disabled) widget (real widget
                 will be hidden) -->
            
            <?php if (isset($form['fake_due_exempt'])): ?>
              <td><?php echo $form['fake_due_exempt'] ?></td>
            <?php else: ?>
              <td><?php echo $form['due_exempt'] ?><?php echo $form['due_exempt']->renderError() ?></td>
            <?php endif ?>
        </tr>
        <tr>
            <th><?php echo $form['street']->renderLabel() ?></th>
            <td><?php echo $form['street'] ?><?php echo $form['street']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['zipcode']->renderLabel() ?></th>
            <td><?php echo $form['zipcode'] ?><?php echo $form['zipcode']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['city']->renderLabel() ?></th>
            <td><?php echo $form['city'] ?><?php echo $form['city']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['country']->renderLabel() ?></th>
            <td><?php echo $form['country'] ?><?php echo $form['country']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['email']->renderLabel() ?></th>
            <td><?php echo $form['email'] ?><?php echo $form['email']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['website']->renderLabel() ?></th>
            <td><?php echo $form['website'] ?><?php echo $form['website']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['phone_home']->renderLabel() ?></th>
            <td><?php echo $form['phone_home'] ?><?php echo $form['phone_home']->renderError() ?></td>
        </tr>
        <tr>
            <th><?php echo $form['phone_mobile']->renderLabel() ?></th>
            <td><?php echo $form['phone_mobile'] ?><?php echo $form['phone_mobile']->renderError() ?></td>
        </tr>

        <tr>
          <th>Champs supplémentaires</th>
          <td>
            <?php echo $form['extra_rows'] ?>
          </td>
        </tr>
    </tbody>
</table>
</form>
