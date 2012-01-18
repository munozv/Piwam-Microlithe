<?php use_helper('Member') ?>
<?php use_helper('Date') 	?>

<h2>Détails d'une cotisation</h2>

<table class="details">
    <tbody>
        <tr>
            <th>Id :</th>
            <td><?php echo $due->getId() ?></td>
        </tr>
        <tr>
            <th>Compte :</th>
            <td><?php echo $due->getAccount() ?></td>
        </tr>
        <tr>
            <th>Cotisation :</th>
            <td><?php echo $due->getDueType() ?></td>
        </tr>
        <tr>
            <th>Montant :</th>
            <td><?php echo $due->getAmount() ?></td>
        </tr>
        <tr>
            <th>Membre :</th>
            <td><?php echo format_member($due->getMember()) ?></td>
        </tr>
        <tr>
            <th>Date de versement :</th>
            <td><?php echo $due->getDate() ?></td>
        </tr>
        <tr>
            <th>
              <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
              Enregistrée le :
            </th>
            <td><?php echo format_datetime($due->getCreatedAt(), 'dd/MM/yyyy HH:mm') ?> par <?php echo format_member($due->getCreatedByMember()) ?></td>
        </tr>
        <tr>
            <th>
              <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
              Dernière édition :
            </th>

            <?php if ($due->getUpdatedBy() !== null): ?>
              <td><?php echo format_datetime($due->getUpdatedAt(), 'dd/MM/yyyy HH:mm') ?> par <?php echo format_member($due->getUpdatedByMember()) ?></td>
            <?php else: ?>
              <td><i>Jamais modifiée</i></td>
            <?php endif ?>
        </tr>
    </tbody>
</table>

<?php echo link_to('Retour', '@dues_list', array('class' => 'blue button')) ?>
&nbsp;
<?php echo link_to('Éditer', '@due_edit?id='.$due->getId(), array('class' => 'blue button')) ?>
