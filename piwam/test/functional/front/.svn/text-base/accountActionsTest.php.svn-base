<?php
include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser   = new sfGuardTestFunctional(new sfBrowser('docbook'));
$foreignId = $browser->addForeignAccount();

// Inputs
$empty       = array();
$only_label  = array('label'=> 'Compte de test');
$only_ref    = array('reference' => 'CDT');
$full        = array('label' => 'Compte de test', 'reference' => 'CDT');


$browser->
info('Access to the account list')->
get('/account/index')->
with('response')->begin()->
    isStatusCode(200)->
    checkElement('h2', 'Liste des comptes')->
end()->



info('Try to add an empty account')->
get('/account/new')->
with('response')->begin()->
    click('Sauvegarder', array('account' => $empty))->
end()->
with('request')->begin()->
    isParameter('module', 'account')->
    isParameter('action', 'create')->
end()->
with('form')->begin()->
    hasErrors(true)->
end()->
with('response')->begin()->
    checkElement('body', '/Requis/')->
end()->




info('Try to add account with only a label')->
get('/account/new')->
with('response')->begin()->
    click('Sauvegarder', array('account' => $only_label))->
end()->
with('request')->begin()->
    isParameter('module', 'account')->
    isParameter('action', 'create')->
end()->
with('form')->begin()->
    hasErrors(true)->
end()->
with('response')->begin()->
    checkElement('body', '/Requis/')->
end()->




info('Try to add account with only a reference')->
get('/account/new')->
with('response')->begin()->
    click('Sauvegarder', array('account' => $only_ref))->
end()->
with('request')->begin()->
    isParameter('module', 'account')->
    isParameter('action', 'create')->
end()->
with('form')->begin()->
    hasErrors(true)->
end()->
with('response')->begin()->
    checkElement('body', '/Requis/')->
end()->


info('Try to add account with correct values')->
get('/account/new')->
with('response')->begin()->
    click('Sauvegarder', array('account' => $full))->
end()->
with('form')->begin()->
    hasErrors(false)->
end()->
followRedirect()->
with('request')->begin()->
    isParameter('module', 'account')->
    isParameter('action', 'index')->
end()->




info('Try to add account with existing reference')->
get('/account/new')->
with('response')->begin()->
  click('Sauvegarder', array('account' => $full))->
end()->
with('form')->begin()->
  hasErrors(true)->
end()->
with('request')->begin()->
  isParameter('module', 'account')->
  isParameter('action', 'create')->
end()->
with('response')->begin()->
  checkElement('body', '/Ce libellé existe déjà/')->
  checkElement('body', '/Cette référence existe déjà/')->
end()->




info('Try to access to foreign account')->
get('/account/show/id/' . $foreignId)->
isRedirected()->
followRedirect()->
with('response')->begin()->
    isStatusCode(200)->
    checkElement('h2', '!/Détails/')->
    checkElement('h2', '/Problème de droits/')->
end()->




info('Try to access to the lastly created account')->
get('/account/show/id/' . ($foreignId + 1))->
with('response')->begin()->
    isStatusCode(200)->
    checkElement('h2', '/Détails du compte CDT/')->
    checkElement('body', '/Firstname Lastname/')->
    checkElement('body', '/Compte de test/')->
end();