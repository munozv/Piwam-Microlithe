
<h2>Liste des activités</h2>

<table class="datalist">

    <!-- Header, describes columns -->

    <thead>
        <tr>
	    <th>Nom</th>
	    <th>Description</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>

<tbody>

  <?php

$ks = memberTable::listActi();
foreach ($ks as $event)
  {
    echo "<tr> <td>" . $event->getSubject()." </td> <td>".$event->getDescription()."</td> <td>".link_to(image_tag('icons/edit', array('alt' => '[modifier]')),   '@listAct_edit?id=' . $event->getId())."</td> </tr>";
  }

?>
</tbody>
</table>
