<?php
/*
 * Partial to display a Account object in a row
 * Input : Account $account
 */
?>

<tr id="account_<?php echo $account->getId() ?>">
    <td><?php echo $account->getLabel() ?></td>
    <td><?php echo $account->getReference() ?></td>
    <td><?php echo format_date($account->getCreatedAt()) ?></td>
    <td>
      <?php echo link_to(image_tag('icons/show', array('alt' => '[details]')),  '@account_show?id='.$account->getId()) ?>
      <?php echo link_to(image_tag('icons/edit', array('alt' => '[modifier]')), '@account_edit?id='.$account->getId()) ?>
      <?php include_partial('global/deleteButton', array('route' => '@account_delete', 'id' => $account->getId())) ?>
    </td>
</tr>