<?php
use_helper('Boolean');
?>

<h2>Configurer</h2>

<h3>Listes des champs supplémentaires :</h3>

<table class="datalist">
  <thead>
    <tr>
      <th>Nom du champ</th>
      <th>Type</th>
      <th>Paramètres</th>
      <th>Défaut</th>
      <th>Description</th>
      <th width="80px">Obligatoire</th>
      <th>&nbsp;</th>
    </tr>
  </thead>
  <tbody>

    <?php foreach($extraRows as $row): ?>
      <tr>
        <td><?php echo $row->getLabel() ?></td>
        <td><?php echo $row->getCompleteType() ?></td>
        <td><?php echo $row->getPrintableParameters() ?></td>
        <td><?php echo $row->getDefaultValue() ?></td>
        <td><?php echo $row->getDescription() ?></td>
        <td><?php echo boolean2icon($row->getRequired()) ?></td>
        <td><?php echo link_to(image_tag('icons/edit'), '@edit_extra_row?id=' . $row->getId()) ?></td>
      </tr>
    <?php endforeach ?>
      
  </tbody>
</table>

<h3>Ajouter un champ :</h3>
<?php include_partial('config_member/form', array('form' => $form)) ?>