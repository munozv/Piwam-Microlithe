<?php use_helper('Number') ?>

<h2>Bilan</h2>

<?php
// Even if it's not really MVC compliant, we compute the total
// amount of Recette / Depense line by line directly within
// this view
$totalExpenses = 0;
$totalIncomes  = 0;
$total         = 0;
?>


<h3>Par compte</h3>
<table class="datalist">
    <thead>
        <tr>
            <th width="60%">Compte</th>
            <th width="10%">Dépenses</th>
            <th width="10%">Recettes</th>
            <th width="10%">Bilan</th>
        </tr>
    </thead>
    <tbody>

        <?php foreach ($accounts as $account): ?>
            <tr class="<?php echo ($account->isNegative()) ? 'negative' : 'positive' ?>">
                <td><?php echo link_to($account->getReference(), '@account_show?id=' . $account->getId(), array('class' => 'block')) ?></td>
                <td><?php echo format_currency($account->getTotalExpenses()); $totalExpenses += $account->getTotalExpenses() ?></td>
                <td><?php echo format_currency($account->getTotalIncomes()); $totalIncomes += $account->getTotalIncomes() ?></td>
                <td><?php echo format_currency($account->getTotal()); $total += $account->getTotal() ?></td>
            </tr>
        <?php endforeach; ?>

        <tr class="<?php echo ($total < 0) ? 'negative' : 'positive' ?>">
            <td><strong>TOTAL</strong></td>
            <td><?php echo format_currency($totalExpenses, '&euro;') ?></td>
            <td><?php echo format_currency($totalIncomes, '&euro;') ?></td>
            <td><?php echo format_currency($total, '&euro;') ?></td>
        </tr>
    </tbody>
</table>



<h3>Par activité</h3>

<?php
// We re-initialize our counters
$totalExpenses = 0;
$totalIncomes  = 0;
$total         = 0;
?>

<table class="datalist">
    <thead>
        <tr>
            <th width="60%">Activité</th>
            <th width="10%">Dépenses</th>
            <th width="10%">Recettes</th>
            <th width="10%">Bilan</th>
        </tr>
    </thead>
    <tbody>
        <tr class="positive">
            <td><?php echo link_to('Cotisations', '@dues_list', array('class' => 'block')) ?></td>
            <td><?php echo format_currency(0) ?></td>
            <td><?php echo format_currency($totalDues); $totalIncomes += $totalDues ?></td>
            <td><?php echo format_currency($totalDues); $total += $totalDues ?></td>
        </tr>

        <?php foreach ($activities as $activity): ?>
            <tr class="<?php echo ($activity->getTotal() < 0) ? 'negative' : 'positive' ?>">
                <td><?php echo link_to($activity->getLabel(), '@activity_show?id=' . $activity->getId(), array('class' => 'block')) ?></td>
                <td><?php echo format_currency($activity->getTotalExpenses()); $totalExpenses += $activity->getTotalExpenses() ?></td>
                <td><?php echo format_currency($activity->getTotalIncomes()); $totalIncomes += $activity->getTotalIncomes() ?></td>
                <td><?php echo format_currency($activity->getTotal()); $total += $activity->getTotal() ?></td>
            </tr>
        <?php endforeach; ?>

        <tr class="<?php echo ($total < 0) ? 'negative' : 'positive' ?>">
            <td><strong>TOTAL</strong></td>
            <td><?php echo format_currency($totalExpenses, '&euro;') ?></td>
            <td><?php echo format_currency($totalIncomes, '&euro;') ?></td>
            <td><?php echo format_currency($total, '&euro;') ?></td>
        </tr>
    </tbody>
</table>




<h3>Créances et dettes</h3>
<table class="datalist">
    <tr class="positive">
        <td width="60%">Créances</td>
        <td width="10%">-</td>
        <td width="10%"><?php echo format_currency($totalUnreceived) ?></td>
        <td width="10%">-</td>
    </tr>
    <tr class="<?php echo ($totalUnpaid == 0) ? "positive" : "negative" ?>">
        <td>Dettes</td>
        <td><?php echo format_currency($totalUnpaid) ?></td>
        <td>-</td>
        <td>-</td>
    </tr>
    <tr class="<?php echo ($totalDebts < 0) ? "negative" : "positive" ?>">
        <td><strong>TOTAL</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><?php echo format_currency($totalDebts, '&euro;') ?></td>
    </tr>
</table>


<!-- Informative message -->

<p style="padding: 10px; background-color: #eee; width: 88%">
    Une discussion est actuellement en cours afin d'améliorer ce "bilan" (export
    PDF, formalisme comptable..)<br />
    N'hésitez pas à <a href="http://code.google.com/p/piwam/wiki/ReflexionCompta">
    donner votre avis</a>.
</p>
