<?php use_helper('Date') ?>
<?php use_helper('Member') ?>
<?php use_helper('Number') ?>

<!-- This template is divided into 3 parts :

        * Details (creation and update dates
        * List of incomes and expenses related to the activity
        * Unpaid expenses and unreceived incomes, with total amount
 -->



<!-- 1st part -->

<h2>Détails pour "<?php echo $activity->getLabel() ?>"</h2>

<table class="details">
    <tbody>
        <tr>
            <th>
                <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                Enregistrée le :
            </th>
            <td>
                <?php echo format_datetime($activity->getCreatedAt(), 'dd/MM/yyyy HH:mm') ?>
                par
                <?php echo format_member($activity->getCreatedByMember()) ?>
            </td>
        </tr>
        <tr>
            <th>
                <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                Mise à jour le :
            </th>
            <td>

                <!-- Has the activity been updated ? -->

            	  <?php if ($activity->getUpdatedBy()): ?>
	                 <?php echo format_datetime($activity->getUpdatedAt(), 'dd/MM/yyyy HH:mm') ?>
            		   par
            		   <?php echo format_member($activity->getUpdatedByMember())?>
                <?php else: ?>
                    <i>Aucune mise à jour pour le moment</i>
                <?php endif ?>

        	 </td>
        </tr>
    </tbody>
</table>



<!-- 2nd part -->

<h3>Recettes et dépenses</h3>

<?php
$totalIncomes   = 0;
$totalExpenses  = 0;
?>

<table class="datalist">
    <thead>
        <tr>
            <th>Libellé</th>
            <th>Débit</th>
            <th>Crédit</th>
            <th>Compte</th>
            <th>Date</th>
        </tr>
    </thead>

    <?php foreach ($records as $entry): ?>
    <tr>
        <td><?php echo $entry->getLabel() ?></td>

        <!-- Display entry differently according to the type (Expense of Income) -->

        <?php if ($entry->getRawValue() instanceof Expense): ?>
            <td class="negative">
                <?php echo format_currency($entry->getAmount()); $totalExpenses += $entry->getAmount() ?>
            </td>
            <td>
                &nbsp;
            </td>
        <?php else: ?>
            <td>
                &nbsp;
            </td>
             <td class="positive">
                <?php echo format_currency($entry->getAmount()); $totalIncomes += $entry->getAmount() ?>
            </td>
        <?php endif; ?>

        <td><?php echo $entry->getAccount() ?></td>
        <td><?php echo format_date($entry->getDate()) ?></td>
    </tr>
    <?php endforeach; ?>


    <!-- Final row, displaying total amount -->

    <tr class="<?php echo ($totalIncomes - $totalExpenses < 0) ? 'negative' : 'positive'; ?>">
        <td><strong>Total</strong></td>
        <td><?php echo format_currency($totalExpenses); ?></td>
        <td><?php echo format_currency($totalIncomes); ?></td>
        <td>&nbsp;</td>
        <td><?php echo format_currency($totalIncomes - $totalExpenses) ?></td>
    </tr>
</table>




<!-- 3rd part -->

<h3>Créances et dettes</h3>

<table class="datalist">
    <tr class="positive">
        <td width="60%">Créances</td>
        <td width="10%">-</td>
        <td width="10%"><?php echo format_currency($iDebts) ?></td>
        <td width="10%">-</td>
    </tr>
    <tr class="<?php echo ($eDebts == 0) ? "positive" : "negative" ?>">
        <td>Dettes</td>
        <td><?php echo format_currency($eDebts) ?></td>
        <td>-</td>
        <td>-</td>
    </tr>
    <tr class="<?php echo ($total < 0) ? "negative" : "positive" ?>">
        <td><strong>TOTAL</strong></td>
        <td>&nbsp;</td>
        <td>&nbsp;</td>
        <td><?php echo format_currency($total, '&euro;') ?></td>
    </tr>
</table>
