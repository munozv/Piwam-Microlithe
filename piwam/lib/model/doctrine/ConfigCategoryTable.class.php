<?php
/**
 * Implements operations on ConfigCategory table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class ConfigCategoryTable extends Doctrine_Table
{
  /**
   * Retrieve all existing categories
   *
   * @return array of ConfigCategory
   */
  public static function getAll()
  {
    $q = Doctrine_Query::create()
          ->from('ConfigCategory c');

    return $q->execute();
  }
}