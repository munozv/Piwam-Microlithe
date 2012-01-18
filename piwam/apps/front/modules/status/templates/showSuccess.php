<?php use_helper('Boolean') ?>
<?php use_helper('Date') ?>
<?php use_helper('Member') ?>

<h2>Détails du Statut</h2>

<table class="details">
    <tbody>
        <tr>
            <th>Id :</th>
            <td><?php echo $statut->getId() ?></td>
        </tr>
        <tr>
            <th>Nom :</th>
            <td><?php echo $statut->getLabel() ?></td>
        </tr>
        <tr>
            <th>Actif :</th>
            <td><?php echo boolean2icon($statut->getState()) ?></td>
        </tr>
        <tr>
            <th>
                <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                Créé le :
            </th>
            <td><?php echo format_datetime($statut->getCreatedAt(), 'dd/MM/yyyy HH:mm') . ' par ' . format_member($statut->getCreatedByMember()) ?></td>
        </tr>
        <tr>
            <th>
                <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                Dernière mise à jour le :
            </th>
            <td><?php echo format_datetime($statut->getUpdatedAt(), 'dd/MM/yyyy HH:mm') . ' par ' . format_member($statut->getUpdatedByMember()) ?></td>
        </tr>
    </tbody>
</table>

<hr />

<a href="<?php echo url_for('@status_edit?id='.$statut->getId()) ?>">Éditer</a>
&nbsp;&bull;&nbsp;
<a href="<?php echo url_for('@status_list') ?>">Retour à la liste</a>
