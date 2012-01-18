<?php use_helper('Number') ?>
<?php use_helper('Date') ?>

<h2>Gestion des types de cotisation</h2>

<table class="datalist">
    <thead>
        <tr>
            <th>Libellé</th>
            <th>Valide (mois)</th>
            <th>Montant</th>
            <th>Créé le</th>
            <th>Dernière édition</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($due_types as $due_type): ?>
            <?php include_partial('dueTypeRow', array('due_type' => $due_type))?>
        <?php endforeach ?>
    </tbody>
</table>

<br />
<?php echo link_to('Nouveau type', '@duetype_new', array('class' => 'add grey button')) ?>

