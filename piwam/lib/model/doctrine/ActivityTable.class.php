<?php
/**
 * Implements operations of activity table
 *
 * @package     piwam
 * @subpackage  model
 * @since       1.2
 * @author      Adrien Mogenet <adrien.mogenet@gmail.com
 */
class ActivityTable extends Doctrine_Table
{
  /**
   * Value of state field when disabled
   *
   * @var integer
   */
  const STATE_DISABLED    = 0;

  /**
   * Value of state field when enabled
   *
   * @var integer
   */
  const STATE_ENABLED     = 1;

  /**
   * Retrieve an unique Activity by its id
   *
   * @param   integer $id
   * @return  Activity
   */
  public static function getById($id)
  {
    $q = Doctrine_Query::create()
          ->from('Activity a')
          ->where('id = ?', $id);

    return $q->fetchOne();
  }

  /**
   * Retrieve list of enabled activities for association $id
   *
   * @param   integer       $id
   * @return  array of Activity
   */
  public static function getEnabledForAssociation($id)
  {
    $q = self::getQueryEnabledForAssociation($id);

    return $q->execute();
  }

  /**
   * Get query object to retrieve list of acitivities
   *
   * @param   integer       $id
   * @return  Doctrine_Query
   */
  public static function getQueryEnabledForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->from('Activity a')
          ->where('a.association_id = ?', $id)
          ->andWhere('a.state = ?', self::STATE_ENABLED)
          ->orderBy('a.label ASC');

    return $q;
  }
}