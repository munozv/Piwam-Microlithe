<?php use_helper('Date') ?>
<?php use_helper('Number') ?>

<h2>Liste des recettes</h2>

<table class="datalist">
    <thead>
        <tr>
            <th>Libellé</th>
            <th>Montant</th>
            <th>Compte</th>
            <th>Date</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($incomesPager->getResults() as $income): ?>
            <?php include_partial('incomeRow', array('income' => $income)) ?>
        <?php endforeach ?>
    </tbody>
</table>

<?php include_partial('global/pager', array('pager' => $incomesPager, 'route' => '@incomes_list', 'params' => array())) ?>

<br />
<?php echo link_to('Nouvelle recette', '@income_new', array('class' => 'add grey button')) ?>
