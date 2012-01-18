<?php
/**
 * Implements operations on DueType table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class DueTypeTable extends Doctrine_Table
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
   * Retrieve an unique DueType by its id
   *
   * @param   integer $id
   * @return  DueType
   */
  public static function getById($id)
  {
    $q = Doctrine_Query::create()
          ->from('DueType t')
          ->where('t.id = ?', $id);

    return $q->fetchOne();
  }

  /**
   * Returns number of existing types for an association
   *
   * @param   integer     $id
   * @return  integer
   */
  public static function countForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->select('t.id')
          ->from('DueType t')
          ->where('t.state = ?', self::STATE_ENABLED)
          ->andWhere('t.association_id = ?', $id);

    return $q->count();
  }

  /**
   * Retrieve active types for association $id
   *
   * @param   integer           $id
   * @return  array of DueType
   */
  public static function getEnabledForAssociation($id)
  {
    $q = self::getQueryEnabledForAssociation($id);

    return $q->execute();
  }

  /**
   * Get Query object to retrieve list of DueType
   *
   * @param   integer $id
   * @return  Doctrine_Query
   */
  public static function getQueryEnabledForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->from('DueType t')
          ->where('t.state = ?', self::STATE_ENABLED)
          ->andWhere('t.association_id = ?', $id);

    return $q;
  }

  /**
   * Get amount of DueType $id
   *
   * @param   integer $id
   * @return  omteger
   */
  public static function getAmountForType($id)
  {
    $q = Doctrine_Query::create()
          ->select('t.amount')
          ->from('DueType t')
          ->where('t.id = ?', $id);

    $type = $q->fetchOne();

    return $type->getAmount();
  }

  /**
   * Count existing DueType
   *
   * @return  integer
   */
  public static function doCount()
  {
    $q = Doctrine_Query::create()
          ->select('t.id')
          ->from('DueType t');

    return $q->count();
  }
}