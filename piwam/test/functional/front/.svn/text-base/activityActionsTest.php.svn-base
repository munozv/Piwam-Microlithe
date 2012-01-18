<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfGuardTestFunctional(new sfBrowser('docbook'));

// Inputs
$empty        = array();
$correctLong  = array('label' => "C'est une première activité");
$correctShort = array('label' => 'Simple');


$browser->

info('List the activities')->
get('activity/index')->
with('request')->begin()->
  isParameter('module', 'activity')->
  isParameter('action', 'index')->
end()->
with('response')->begin()->
  isStatusCode(200)->
  checkElement('h2', 'Liste des activités')->
  checkElement('tr', 2)->
end()->



info('Add a new empty activity')->
get('activity/new')->
with('response')->begin()->
  click('Sauvegarder', array('activity' => $empty))->
end()->
with('form')->begin()->
  hasErrors(true)->
end()->
with('response')->begin()->
  checkElement('body', '/Requis/')->
end()->



info('Add a correct activity')->
with('response')->begin()->
    click('Sauvegarder', array('activity' => $correctLong))->
end()->
with('form')->begin()->
  hasErrors(false)->
end()->
isRedirected()->
followRedirect()->
with('request')->begin()->
    isParameter('module', 'activity')->
    isParameter('action', 'index')->
end()->

        
info('Add an existing activity')->
get('activity/new')->
with('response')->begin()->
  click('Sauvegarder', array('activity' => $correctLong))->
end()->
with('form')->begin()->
  hasErrors(true)->
end()->
with('response')->begin()->
  checkElement('body', '/existe/')->
end()->



info('Check that we now have 2 activities')->
get('activity/index')->
with('response')->begin()->
  checkElement('tbody tr', 2)->
end()
;
