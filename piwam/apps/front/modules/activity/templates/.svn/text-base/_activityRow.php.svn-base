<tr id="<?php echo $activity->getId() ?>">
    <td>
        <?php echo $activity->getLabel() ?>
    </td>
    <td>
        <?php echo format_date($activity->getCreatedAt()) ?>
    </td>
    <td>
        <?php echo link_to(image_tag('icons/show', array('alt' => '[détails]')), '@activity_show?id=' . $activity->getId()) ?>
        <?php echo link_to(image_tag('icons/edit', array('alt' => '[modifier]')),   '@activity_edit?id=' . $activity->getId()) ?>
        <?php echo link_to(image_tag('icons/delete'), '@activity_delete?id=' . $activity->getId(), array(
            'method'  => 'delete',
            'confirm' => 'Etes vous sûr ? Les recettes et dépenses associées seront aussi supprimées'
        )) ?>
    </td>
</tr>