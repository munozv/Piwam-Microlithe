<?php
/**
 * Implements operations on ConfigVariable table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class ConfigVariableTable extends Doctrine_Table
{
  /**
   * Get a ConfigVariable by its code
   *
   * @param   string  $code
   * @return  ConfigVariable
   */
  public static function getByCode($code)
  {
    $q = Doctrine_Query::create()
          ->from('ConfigVariable v')
          ->where('v.code = ?', $code);

    return $q->fetchOne();
  }

  /**
   * Retrieve all variables which belong to the category $code
   *
   * @param   string                  $code
   * @return  array of ConfigVariable
   */
  public static function getByCategoryCode($code)
  {
    $q = Doctrine_Query::create()
          ->from('ConfigVariable v')
          ->where('v.category_code = ?', $code);

    return $q->execute();
  }

  /**
   * Count existing ConfigVariable
   *
   * @return  integer
   */
  public static function doCount()
  {
    $q = Doctrine_Query::create()
          ->select('v.id')
          ->from('ConfigVariable v');

    return $q->count();
  }
}