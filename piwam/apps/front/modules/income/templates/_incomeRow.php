<tr id="income_<?php echo $income->getId() ?>">
    <td><?php echo $income->getLabel() ?></td>
    <td><?php echo format_currency($income->getAmount()) ?></td>
    <td><?php echo $income->getAccount() ?></td>
    <td>
        <?php
        if ($income->getReceived() == 1)
        {
            echo format_date($income->getDate());
        }
        else
        {
            echo 'Non perçue';
        }
        ?>
    </td>
    <td>
        <?php echo link_to(image_tag('icons/show', array('alt' => '[détails]')), '@income_show?id=' . $income->getId()) ?>
        <?php echo link_to(image_tag('icons/edit', array('alt' => '[modifier]')), '@income_edit?id=' . $income->getId()) ?>
        <?php echo link_to(image_tag('icons/delete', array('alt' => '[supprimer]')), '@income_delete?id=' . $income->getId(), array('method' => 'delete', 'confirm' => 'Ètes vous sûr ?')) ?>
    </td>
</tr>