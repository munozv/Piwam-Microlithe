<?php
/*
 * Display a Due object in a row
 */
?>

<tr id="due_<?php echo $due->getId() ?>">
    <td><?php echo $due->getAccount() ?></td>
    <td><?php echo $due->getDueType() ?></td>
    <td><?php echo format_currency($due->getAmount(), '&euro;') ?></td>
    <td><?php echo $due->getMember() ?></td>
    <td><?php echo format_date($due->getDate()) ?></td>
    <td>
        <?php echo link_to(image_tag('icons/show', array('alt' => '[détails]')),      '@due_show?id=' . $due->getId()) ?>
        <?php echo link_to(image_tag('icons/edit', array('alt' => '[modifier]')),     '@due_edit?id=' . $due->getId()) ?>
        <?php echo link_to(image_tag('icons/delete', array('alt' => '[supprimer]')),  '@due_delete?id=' . $due->getId(), array('method' => 'delete', 'confirm' => 'Ètes vous sûr ?')) ?>
    </td>
</tr>