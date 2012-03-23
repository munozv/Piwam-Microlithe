<?php

$name = AssociationTable::getUnique()->getName();
$tel = AssociationTable::getUnique()->getTel();
$mail = AssociationTable::getUnique()->getMail();
$town = AssociationTable::getUnique()->getVille();
$adresse = AssociationTable::getUnique()->getAdress();
$codepostal = AssociationTable::getUnique()->getCodePostal();


echo "<form action=\"../../../pdf/examples/pdf.php\" method=\"post\" enctype=\"multipart/form-data\">
<input type=\"hidden\" name=\"name\" value=".$name."><br />
<input type=\"hidden\" name=\"tel\" value=".$tel."><br />
<input type=\"hidden\" name=\"mail\" value=".$mail."><br />
<input type=\"hidden\" name=\"town\" value=".$town."><br />
<input type=\"hidden\" name=\"adresse\" value=".$adresse."><br />
<input type=\"hidden\" name=\"codepostal\" value=".$codepostal."><br />
<input type=\"submit\" value=\"configurer\">
</form>
";

?>