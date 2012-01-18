<?php
/**
 * Implements operations on ConfigValue table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class ConfigValueTable extends Doctrine_Table
{
  /**
   * Retrieve value by code
   *
   * @param   string      $code
   * @param   integer     $id
   * @return  ConfigValue
   */
  public static function getByCodeForAssociation($code, $id)
  {
    $q = Doctrine_Query::create()
          ->from('ConfigValue value')
          ->leftJoin('value.ConfigVariable variable')
          ->where('value.association_id = ?', $id)
          ->andWhere('variable.code = ?', $code);

    return $q->fetchOne();
  }
}