<?php use_helper('Date') 	?>
<?php use_helper('Member') 	?>
<?php use_helper('Number') 	?>
<?php use_helper('Boolean')  ?>

<h2>Détails d'une entrée d'argent</h2>
<table class="details">
    <tbody>
        <tr>
            <th>Id :</th>
            <td><?php echo $income->getId() ?></td>
        </tr>
        <tr>
            <th>Libellé :</th>
            <td><?php echo $income->getLabel() ?></td>
        </tr>
        <tr>
            <th>Montant :</th>
            <td><?php echo format_currency($income->getAmount(), '&euro;') ?></td>
        </tr>
        <tr>
            <th>Compte affecté :</th>
            <td><?php echo $income->getAccount() ?></td>
        </tr>
        <tr>
            <th>Activité :</th>
            <td><?php echo $income->getActivity() ?></td>
        </tr>
        <?php if ($income->getReceived() == 1): ?>
        <tr>
            <th>Effective le :</th>
            <td><?php echo format_date($income->getDate()) ?></td>
        </tr>
        <?php else: ?>
        <tr>
            <th>Perçue :</th>
            <td><?php echo boolean2icon(false) ?></td>
        </tr>
        <?php endif; ?>
        <tr>
            <th><?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?> Créée le
            :</th>
            <td><?php echo format_datetime($income->getCreatedAt(), 'dd/MM/yyyy HH:mm') . ' par ' . format_member($income->getCreatedByMember()) ?></td>
        </tr>
        <tr>
            <th><?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?> Mise à
            jour le :</th>
            <td><?php echo format_datetime($income->getUpdatedAt(), 'dd/MM/yyyy HH:mm') . ' par ' . format_member($income->getUpdatedByMember()) ?></td>
        </tr>
    </tbody>
</table>

<hr />

<a href="<?php echo url_for('@income_edit?id='.$income->getId()) ?>">Editer</a>
&nbsp;
<a href="<?php echo url_for('@incomes_list') ?>">Retour</a>
