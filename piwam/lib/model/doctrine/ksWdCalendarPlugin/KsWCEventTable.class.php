<?php

/**
 * KsWCEventTable
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 */
class KsWCEventTable extends PluginKsWCEventTable
{
    /**
     * Returns an instance of this class.
     *
     * @return object KsWCEventTable
     */
    public static function getInstance()
    {
        return Doctrine_Core::getTable('KsWCEvent');
    }
}