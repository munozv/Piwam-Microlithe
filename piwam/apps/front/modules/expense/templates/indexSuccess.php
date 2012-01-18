<?php use_helper('Date') ?>
<?php use_helper('Number') ?>

<h2>Gestion des dépenses</h2>

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
        <?php foreach ($expensesPager->getResults() as $expense): ?>
            <?php include_partial('expenseRow', array('expense' => $expense)) ?>
        <?php endforeach ?>
    </tbody>
</table>

<?php include_partial('global/pager', array('pager' => $expensesPager, 'route' => '@expenses_list', 'params' => array())) ?>

<br />
<?php echo link_to('Nouvelle dépense', '@expense_new', array('class' => 'grey add button')) ?>

