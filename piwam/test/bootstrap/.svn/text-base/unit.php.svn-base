<?php

/*
 * This file is part of the symfony package.
 * (c) 2004-2006 Fabien Potencier <fabien.potencier@symfony-project.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

$_test_dir = realpath(dirname(__FILE__).'/..');

// configuration
require_once dirname(__FILE__).'/../../config/ProjectConfiguration.class.php';
$configuration = ProjectConfiguration::hasActive() ? ProjectConfiguration::getActive() : new ProjectConfiguration(realpath($_test_dir.'/..'));

// autoloader
$autoload = sfSimpleAutoload::getInstance(sfConfig::get('sf_cache_dir').'/project_autoload.cache');
$autoload->loadConfiguration(sfFinder::type('file')->name('autoload.yml')->in(array(
  sfConfig::get('sf_symfony_lib_dir').'/config/config',
  sfConfig::get('sf_config_dir'),
)));
$autoload->register();

// lime
include $configuration->getSymfonyLibDir() . '/vendor/lime/lime.php';

// We create a context to be able to use database
$configuration = ProjectConfiguration::getApplicationConfiguration('front', 'test', isset($debug) ? $debug : true);
sfContext::createInstance($configuration);

// remove all cache
sfToolkit::clearDirectory(sfConfig::get('sf_app_cache_dir'));
// load fixtures
Doctrine::loadData(sfConfig::get('sf_data_dir') . '/fixtures/test_data.yml');