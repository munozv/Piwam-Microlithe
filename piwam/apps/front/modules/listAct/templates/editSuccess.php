<h2>Membres inscrits</h2>


<table class="datalist">

    <thead>
        <tr>
	    <th>Nom</th>
	    <th>Prenom</th>
	    <th>A payee</th>   
            <th class="actions">Actions</th>
        </tr>
    </thead>

   <tbody>

   <?php 
   function myStrToWordTab($String, $delim)
{
  $i = 0;
  $ar = array();
  $ar = explode($delim, $String);
  return ($ar);
}

 //$member =  MemberTable::getById(1);
 //echo $member->getFirstname();
   $event = ksWCEventTable::getListUser($this->id);
$ar = array();
$ar = myStrToWordTab($event->getDescription(), ';');
$i = 0;
while ($i != count($ar))
  {
    $artmp = myStrToWordTab($ar[$i], ':');
    $member = MemberTable::getById($artmp[0]);
    if ($artmp[1] == 'y')
      $mess = "Oui";
    else
      $mess = "Non";
    echo "<tr> <td> ". $member->getFirstName()."</td> <td>".$member->getLastName()."</td> <td>".$mess."</td> <td>".link_to(image_tag('icons/edit', array('alt' => '[modifier]')),   '@listAct').link_to(image_tag('icons/delete', array('alt' => '[effacer]')), '@listAct')." </td> </tr>";
    $i++;
  }

 ?>
</tbody>

</table>