<?php use_helper('Tooltip') ?>

<form action="<?php echo url_for('@config') ?>" method="post">
<table class="formtable">
    <tfoot>
        <tr>
            <td>&nbsp;</td>
            <td><input type="submit" class="blue button" value="Sauvegarder" />

        </tr>
    </tfoot>

    <?php foreach ($form->getFormFieldSchema() as $widget): ?>
    <tr>
        <th>
            <?php echo $widget->renderLabel() ?>
        </th>
        <td>
            <?php echo $widget ?>


            <!-- Display tooltip if description has been provided -->

            <?php if ($help = $form->getDescription($widget->getName())): ?>
                <?php echo tooltip_tag('', $help); ?>
            <?php endif ?>

            <?php echo $widget->renderError() ?>
        </td>
        <?php endforeach ?>
</table>
</form>
