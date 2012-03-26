<?php

require_once('../config/lang/eng.php');
require_once('../tcpdf.php');

$nameasso = 'Microlithe';
$adresse = '59 bis rue Olivier Metra';
$codepostal = '75020';
$ville = 'Paris';

$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
$titlehead = '                                                                                                                       '.$nameasso;
$stringhead = '                                                                                                                '.$adresse."\n".'                                                                                                                                  '.$codepostal.' '.$ville;


$pdf->AddPage();
$assotel = '0134437480';
$assofax = 'www.fax.com';
$assoname = 'Microlithe';
$assoadresse = 'Somewhere';

$clientname = 'C&eacute;dric';
$clientadresse = '36 rue salengro';

$number = '2';
$date = '24/08/1991';
$prestaplace = 'On Earth';
$expirationdate = '2015';
$modamoney = 'en Cash like a boss';

$servicename ='d&eacute;m&eacute;nagement';
$servicequantity = '2';
$servicepriceunit='150&euro;';
$servicepricetotal='300&euro;';
$pourcentagetva='19,6';
$tvaprice='32,12&euro;';
$totalttc='332,12&euro;';


$html = '
<div align="left">
'.$assoname.'
<br/>
'.$assoadresse.'<br/>'.$assotel.'<br/>'.$assofax.'<br/>
</div>
<div align="right">
'.$clientname.'
<br/>
'.$clientadresse.'
<br/>
</div>

<div align="center">
<font size="16"><B>Devis N&deg;'.$number.'</B></font>
</div>
<div align="left">
&eacute;tablis le : '.$date.'
<br/>
<br/>
Lieu de prestation: '.$prestaplace.'
</div>
<br/>
<br/>

<table border="1">
<tr>
<th><B>D&eacute;signation</B></th>
<th><B>Quantit&eacute;</B></th>
<th><B>Prix unitaire</B></th>
<th><B>Prix total</B></th>
</tr>
<tr>
<th>'.$servicename.'</th>
<th>'.$servicequantity.'</th>
<th>'.$servicepriceunit.'</th>
<th>'.$servicepricetotal.'</th>
</tr>
</table>
<div align="right">
Total HT :'.$servicepricetotal.'
<br/>
TVA &agrave; '.$pourcentagetva.'% :'.$tvaprice.'
<br/>
Total TTC : '.$totalttc.'
<br/>
</div>
<br/>

<div align="left">
Dur&eacute;e de la validit&eacute; du devis: '.$expirationdate.'
<br/>
Devis gratuit
<br/>
Modalit&eacute; de paiement:
<br/>
'.$modamoney.'
<br/>
<br/>
Devis re&ccedil;u avant l\'&eacute;xecution des travaux
</br>	
</div>
<br/>
<br/>
<div align="right">
Date : '.$date.'
<br/>
Bon pour accord
<br/>
Signature du client
<br/>
</div>
';

$pdf->writeHTML($html, true, 0, true, 0);
$pdf->Output('devis.pdf', 'D');