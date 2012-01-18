<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfGuardTestFunctional(new sfBrowser());

// Inputs
$income_empty         = array();
$income_wrong_amount  = array('label' => "Vente d'eau", 'amount' => '21a');
$income_ok            = array('label' => "Vente d'eau", 'amount' => '43.21');
$creance_ok           = array('label' => "Vente d'eau", 'amount' => '43.21', 'percue' => '0');


$browser->

info("Retrieve incomes list")->
get('/income/index')->
with('request')->begin()->
    isParameter('module', 'income')->
    isParameter('action', 'index')->
end()->



info("Ajout d'une income vide")->
get('/income/new')->
with('request')->begin()->
    isParameter('module', 'income')->
    isParameter('action', 'new')->
end()->
with('response')->begin()->
    click('Sauvegarder', array('income' => $income_empty))->
end()->
with('form')->begin()->
    hasErrors(true)->
    isError('label', 'required')->
    isError('amount', 'required')->
end()->
with('request')->begin()->
    isParameter('module', 'income')->
    isParameter('action', 'create')->
end()->



info("Add a new income with invalid amount")->
with('response')->begin()->
    click('Sauvegarder', array('income' => $income_wrong_amount))->
end()->
with('form')->begin()->
    hasErrors(true)->
    isError('label', false)->
    isError('amount', 'invalid')->
end()->




info("Add a correct income")->
with('response')->begin()->
    click('Sauvegarder', array('income' => $income_ok))->
end()->
followRedirect()->
with('request')->begin()->
    isParameter('module', 'income')->
    isParameter('action', 'index')->
end()->
with('response')->begin()->
    contains("Vente d&#039;eau")->
    contains("43,21")->
    contains("CAISSE_MONNAIE")->
end()->



info("View details of an income")->
with('response')->begin()->
    click('[détails]')->
end()->
with('response')->begin()->
    click('Retour')->
end()->



info("Try to edit an income")->
with('response')->begin()->
    click('[modifier]')->
end();
