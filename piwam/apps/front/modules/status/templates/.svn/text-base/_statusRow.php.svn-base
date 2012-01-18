<?php
/*
 * Display status object in a row
 */
?>

<tr id="status_<?php echo $status->getId() ?>">
    <td><?php echo $status->getLabel() ?></td>
    <td><?php echo $status->countEnabledMembers() ?></td>
    <td>
        <?php echo link_to(image_tag('icons/show', array('alt' => '[détails]')), '@status_show?id=' . $status->getId()) ?>
        <?php echo link_to(image_tag('icons/edit', array('alt' => '[modifier]')), '@status_edit?id=' . $status->getId()) ?>
        <?php echo link_to(image_tag('icons/delete', array('alt' => '[supprimer]')), '@status_delete?id=' . $status->getId(), array('method' => 'delete', 'confirm' => 'Etes vous sur ?')) ?>
    </td>
</tr>