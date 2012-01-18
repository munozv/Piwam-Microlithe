
<!-- Displays pending subscriptions -->

<?php if (count($pending)): ?>
    <h2>Demandes d'adhésion en attente...</h2>

    <table class="datalist" summary="Members who would like to belong to the association">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Pseudo</th>
                <th>Statut</th>
                <th>Ville</th>
                <th width="100px">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($pending as $member): ?>
                <?php include_partial('memberRow', array('member' => $member)) ?>
            <?php endforeach ?>
        </tbody>
    </table>
<?php endif ?>



<!-- And then displays the subscribed members -->

<h2>Liste des membres</h2>

<td><?php include_partial('searchForm', array('form' => $searchForm)) ?></td>

<table class="datalist" summary="Members who would like to belong to the association">
    <thead>
        <tr>
            <th><?php echo link_to('Nom',    '@members_list?orderby=lastname&page=' . $page) ?></th>
            <th><?php echo link_to('Prénom', '@members_list?orderby=firstname&page=' . $page) ?></th>
            <th><?php echo link_to('Pseudo', '@members_list?orderby=username&page=' . $page) ?></th>
            <th><?php echo link_to('Statut', '@members_list?orderby=status_id&page=' . $page) ?></th>
            <th><?php echo link_to('Ville',  '@members_list?orderby=city&page=' . $page) ?></th>
            <th width="75px">Actions</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($members->getResults() as $member): ?>
            <?php include_partial('memberRow', array('member' => $member)) ?>
        <?php endforeach ?>

    </tbody>
</table>


<!-- Display the legend -->

<table style="border: 1px solid #999; margin-top: 15px; margin-bottom: 10px; width: 500px;">
    <tr style="font-weight: bold; background-color: #ddd; color: #555;">
        <td colspan="5">Légende&nbsp;</td>
    </tr>
    <tr>
        <td class="hasToPayDue" width="20px">&nbsp;</td>
        <td>Cotisation non à jour</td>
        <td><?php echo image_tag('icons/email', array('align' => 'absmiddle')) ?> Envoyer un e-mail</td>
        <td><?php echo image_tag('icons/profile', array('align' => 'absmiddle')) ?> Détails</td>
        <td><?php echo image_tag('icons/delete', array('align' => 'absmiddle')) ?> Supprimer</td>
    </tr>
    <tr>
        <td style="border: 1px solid #bbb;" width="20px">&nbsp;</td>
        <td>Cotisation à jour</td>
        <td><?php echo image_tag('icons/no_email', array('align' => 'absmiddle')) ?> Pas d'e-mail</td>
        <td><?php echo image_tag('icons/edit', array('align' => 'absmiddle')) ?> Éditer</td>
        <td>&nbsp;</td>
    </tr>
</table>

<?php echo link_to('Enregistrer un membre', '@member_new', array('class' => 'add grey button')) ?>

<?php include_partial('global/pager', array('pager' => $members, 'route' => '@members_list', 'params' => array('orderby' => $orderByColumn))) ?>
