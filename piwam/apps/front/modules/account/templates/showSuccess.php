<?php use_helper('Member') ?>
<?php use_helper('Date') ?>

<h2>Détails du compte <?php echo $account->getReference() ?></h2>

<table class="details" summary="Details of an account">
    <tbody>
        <tr>
            <th>Libellé :</th>
            <td><?php echo $account->getLabel() ?></td>
        </tr>
        <tr>
            <th>Référence :</th>
            <td><?php echo $account->getReference() ?></td>
        </tr>
        <tr>
            <th>
                <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                Enregistré le :
            </th>
            <td>
                <?php echo format_datetime($account->getCreatedAt(), 'dd/MM/yyyy HH:mm') ?>
                par
                 <?php echo format_member($account->getCreatedByMember()) ?>
            </td>
        </tr>
        <tr>
            <th>
                <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                Mise à jour le :
            </th>
            <td>
                <?php if ($account->getUpdatedBy()):?>
                    <?php echo format_datetime($account->getUpdatedAt(), 'dd/MM/yyyy HH:mm') ?>
                    par
                    <?php echo format_member($account->getUpdatedByMember()) ?>
                <?php else: ?>
                    <i>Aucune mise à jour pour le moment</i>
                <?php endif ?>
            </td>
        </tr>
    </tbody>
</table>

<hr />

<a href="<?php echo url_for('@account_edit?id='.$account->getId()) ?>">Editer</a>
&bull;
<a href="<?php echo url_for('@accounts_list') ?>">Retour &agrave; la liste</a>
