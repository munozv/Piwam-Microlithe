<?php
/**
 * Implements operations on AclAction table
 *
 * @package     piwam
 * @subpackage  model
 * @since       1.2
 * @author      Adrien Mogenet
 */
class AclActionTable extends Doctrine_Table
{
  /**
   * Retrieve all existing AclActions
   *
   * @return  array of AclAction
   */
  public static function getAll()
  {
    $q = Doctrine_Query::create()
          ->from('AclAction a');

    return $q->execute();
  }

  /**
   * Retrieve a unique AclAction by its $code
   *
   * @param   string    $code
   * @return  AclAction
   */
  public static function getByCode($code)
  {
    $q = Doctrine_Query::create()
          ->from('AclAction a')
          ->where('a.code = ?', $code);

    return $q->fetchOne();
  }

  /**
   * Count existing Actions
   *
   * @return  integer
   */
  public static function doCount()
  {
    $q = Doctrine_Query::create()
          ->select('a.id')
          ->from('AclAction a');

    return $q->count();
  }
}