<?php
/**
 * Implements operations on AclModule table
 *
 * @package     piwam
 * @subpackage  model
 * @author      adrien
 * @since       1.2
 */
class AclModuleTable extends Doctrine_Table
{
  /**
   * Retrieve all the modules
   *
   * @return array of AclModule
   */
  public static function getAll()
  {
    $q = Doctrine_Query::create()
          ->from('AclModule m');

    return $q->execute();
  }
}