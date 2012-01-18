<?php
/*
 * Displays dueType object in a row
 */
?>
<tr id="duetype_<?php echo $due_type->getId() ?>">
    <td><?php echo $due_type->getLabel() ?></td>
    <td><?php echo $due_type->getPeriod() ?></td>
    <td><?php echo format_currency($due_type->getAmount(), '&euro;') ?></td>
    <td><?php echo format_date($due_type->getCreatedAt()) ?></td>
    <td><?php echo format_date($due_type->getUpdatedAt()) ?></td>
    <td>
        <?php echo link_to(image_tag('icons/edit',   array('alt' => '[modifier]')),  '@duetype_edit?id=' . $due_type->getId())?>
        <?php echo link_to(image_tag('icons/delete', array('alt' => '[supprimer]')), '@duetype_delete?id=' . $due_type->getId(), array('method' => 'delete', 'confirm' => 'Ètes vous sûr ?')) ?>
    </td>
</tr>