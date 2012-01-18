<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

// Array of data we will put on the forms
$association_ok             = array('name' => 'Test', 'description' => 'Description association', 'website' => 'http://www.association.com', 'ping_piwam' => false);
$association_update_ok      = array('name' => 'New',  'description' => 'Description association', 'website' => 'http://www.association.com');
$association_with_bad_url   = array('name' => 'Test', 'description' => 'Description association', 'website' => 'mywebsite');
$association_empty          = array('name' => '',     'description' => '', 'site_web' => '');

$membre_ok                  = array('lastname' => 'Foobar', 'firstname' => 'Roger', 'username' => 'foobar_123', 'password' => 'passwrd29');
$membre_empty               = array('lastname' => '', 'firstname' => '', 'username' => '', 'password' => '');

$browser = new sfGuardTestFunctional(new sfBrowser('docbook'), false);

$browser->


info("New association with empty data")->
get('/association/new')->
with('response')->begin()->
  click("Étape suivante >", array('association' => $association_empty))->
end()->
with('form')->begin()->
  hasErrors(true)->
end()->



info("New association with correct data")->
with('response')->begin()->
  click("Étape suivante >", array('association' => $association_ok))->
end()->
with('response')->
followRedirect()->
with('request')->begin()->
  isParameter('module', 'member')->
  isParameter('action', 'newfirst')->
end()->



info("Register the first member with empty data")->
with('response')->begin()->
  click("Étape suivante >", array('member' => $membre_empty))->
end()->
with('form')->begin()->
hasErrors(true)->
end()->



info("Enregistrement du premier membre avec donnes valides")->
with('response')->begin()->
  click("Étape suivante >", array('member' => $membre_ok))->
end()->
isRedirected()->
followRedirect()->
with('request')->begin()->
  isParameter('module', 'member')->
  isParameter('action', 'endregistration')->
end()->



signin(array('username' => sfGuardTestFunctional::LOGIN_OK, 'password' => sfGuardTestFunctional::PASSWORD_OK))->


info("Try to edit without giving ID as argument : 404 error page")->
get('/association/edit')->
with('response')->begin()->
  isStatusCode(404)->
end()->



info("Access to the edit page")->
get('/association/index')->
click("A propos de l'association")->
with('response')->begin()->
  isStatusCode(200)->
  checkElement('body', '/Nom de l\'association/')->
  info("Submit with empty form")->
  click('Sauvegarder', array('association' => $association_empty))->
end()->
with('request')->begin()->
  isParameter('module', 'association')->
  isParameter('action', 'update')->
end()->
with('form')->begin()->
    hasErrors(true)->
end()->



info("Form filled with wrong website")->
with('response')->begin()->
  isStatusCode(200)->
  click('Sauvegarder', array('association' => $association_with_bad_url))->
end()->
with('form')->begin()->
  hasErrors(true)->
end()->
with('request')->begin()->
  isParameter('module', 'association')->
  isParameter('action', 'update')->
end()->



info("Form with correct data")->
with('response')->begin()->
  isStatusCode(200)->
  click('Sauvegarder', array('association' => $association_update_ok))->
end()->
with('form')->begin()->
  hasErrors(false)->
end()->
with('response')->debug()->
isRedirected()->
followRedirect()->
with('request')->begin()->
  isParameter('module', 'member')->
  isParameter('action', 'index')->
end()->
with('response')->debug();
