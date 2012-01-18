<?php use_helper('Date') ?>

<h2>Liste des comptes</h2>

<table class="datalist">
    <thead>
        <tr>
            <th>Libellé</th>
            <th>Référence</th>
            <th>Enregistré le</th>
            <th class="actions">&nbsp;</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($accounts as $account): ?>
            <?php include_partial('accountRow', array('account' => $account))?>
        <?php endforeach ?>

    </tbody>
</table>

<br />
<?php echo link_to('Enregistrer un compte', '@account_new', array('class' => 'grey add button')) ?>

