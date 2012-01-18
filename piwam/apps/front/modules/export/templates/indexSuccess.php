<h2>Exporter les données</h2>
<p>Choisissez les données que vous souhaitez exporter :</p>
<ul>
    <li><?php echo image_tag('puce1.gif') ?> <?php echo link_to('Liste des membres', '@export_members') ?></li>
    <li><?php echo image_tag('puce1.gif') ?> <?php echo link_to('Recettes', '@export_incomes') ?></li>
    <li><?php echo image_tag('puce1.gif') ?> <?php echo link_to('Dépenses', '@export_expenses') ?></li>
</ul>
