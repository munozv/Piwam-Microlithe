<h2>Gestion des statuts</h2>

<?php if ($sf_user->hasFlash('notice')): ?>
    <div class="error">
        <?php echo $sf_user->getFlash('notice') ?>
    </div>
<?php endif; ?>

<table class="datalist">
    <thead>
        <tr>
            <th>Libellé</th>
            <th width="70px">Membres</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($status_list as $status): ?>
            <?php include_partial('statusRow', array('status' => $status)) ?>
        <?php endforeach ?>
    </tbody>
</table>

<br />
<?php echo link_to('Nouveau statut', '@status_new', array('class' => 'grey add button')) ?>
