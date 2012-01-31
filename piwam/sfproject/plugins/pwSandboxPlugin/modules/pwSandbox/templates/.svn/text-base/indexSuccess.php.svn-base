<h2>Liste des dettes</h2>

<!-- Datalist is a class provided by the core of Piwam -->
<table class="datalist">

  <!-- Columns are defined in thead tag -->
  <thead>
    <tr>
      <th>Membre</th>
      <th>Montant</th>
      <th>Date</th>
    </tr>
  </thead>

  <!-- And now we can use the $debts variable given by actions.class.php -->
  <tbody>

    <?php foreach ($debts as $debt): ?>
      <tr>
        <td><?php echo $debt->getMember() ?></td>
        <td><?php echo $debt->getAmount() ?></td>
        <td><?php echo $debt->getCreatedAt() ?></td>
      </tr>
    <?php endforeach ?>

  </tbody>
</table>

<!-- Display a link to register a new Debt
     We use the `link_to` helper provided by symfony -->

<br />
<?php echo link_to('Nouvelle dette', 'pwSandbox/new', array('class' => 'grey add button')) ?>