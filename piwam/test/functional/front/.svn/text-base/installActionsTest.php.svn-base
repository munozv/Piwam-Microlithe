<?php

include(dirname(__FILE__).'/../../bootstrap/functional.php');

$browser = new sfTestFunctional(new sfBrowser());

$browser->
get('/install/index')->

with('request')->begin()->
    isParameter('module', 'install')->
    isParameter('action', 'index')->
end()->

with('response')->begin()->
    isStatusCode(200)->
    checkElement('body', '/Installation/')->
end()->


info('Access to the database configuration page')->
get('/install/configDatabase')->
with('request')->begin()->
    isParameter('module', 'install')->
    isParameter('action', 'configDatabase')->
end();
