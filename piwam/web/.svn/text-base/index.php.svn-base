<?php
require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

try
{
    $configuration = ProjectConfiguration::getApplicationConfiguration('front', 'prod', false);
    sfContext::createInstance($configuration)->dispatch();
}
catch (sfCacheException $e)
{
    require_once(dirname(__FILE__) . '/cache_error.php');
}
catch (sfException $e)
{
    echo '<h2>Oups, on dirait qu\'il y a une erreur...</h2>';
    echo '<p>Vous pouvez demander de l\'aide sur <a href="http://groups.google.com/group/piwam">http://groups.google.com/group/piwam</a>.</p>';
    echo '<pre>' . $e . '</pre>';
}