<?php
/*
 * Display Expense object in a row
 */
?>

<tr id="expense_<?php echo $expense->getId() ?>">
    <td><?php echo $expense->getLabel() ?></td>
    <td><?php echo format_currency($expense->getAmount()) ?></td>
    <td><?php echo $expense->getAccount() ?></td>
    <td>
        <?php if ($expense->getPaid() == 1): ?>
            <?php echo format_date($expense->getDate()) ?>
        <?php else: ?>
            <?php echo 'Non payée'; ?>
        <?php endif ?>
    </td>
    <td>
        <?php echo link_to(image_tag('icons/show', array('alt' => '[details]')), '@expense_show?id=' . $expense->getId()) ?>
        <?php echo link_to(image_tag('icons/edit', array('alt' => '[modifier]')), '@expense_edit?id=' . $expense->getId()) ?>
        <?php echo link_to(image_tag('icons/delete', array('alt' => '[supprimer]')), '@expense_delete?id=' . $expense->getId(), array('method' => 'delete', 'confirm' => 'Ètes vous sûr ?')) ?>
    </td>
</tr>