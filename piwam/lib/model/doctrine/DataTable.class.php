<?php
/**
 * Manage operations on table 'data'
 *
 * @package     Piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class DataTable extends Doctrine_Table
{
  /**
   * Retrieve a value by its key
   *
   * @param   string  $key
   * @return  string
   */
  public static function getByKey($key)
  {
    $q = Doctrine_Query::create()
          ->select('d.value')
          ->from('Data d')
          ->where('d.config_key = ?', $key);

    $row = $q->fetchOne();

    return $row->getValue();
  }
}