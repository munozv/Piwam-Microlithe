<?php

require_once dirname(__FILE__) . '/../lib/vendor/symfony/1.3/lib/autoload/sfCoreAutoload.class.php';

sfCoreAutoload::register();

class ProjectConfiguration extends sfProjectConfiguration
{
    public function setup()
    {
        /*
         * Configuration
         * -------------
         * If you want to set your own /cache and /logs folders,
         * uncomment the 2 following lines and set values with your owns
         */
        //$this->setCacheDir('/tmp/symfony_cache');
        //$this->setLogDir('/tmp/symfony_logs');

        // End of editable area. Do NOT edit following lines
        $this->enablePlugins(array( 'sfDoctrinePlugin',
                                    'sfImageTransformPlugin',
                                    'sfFormExtraPlugin',
                                    'fcLogAnalyzerPlugin',
                                    'pwSandboxPlugin'
                                   ));
    }
}
