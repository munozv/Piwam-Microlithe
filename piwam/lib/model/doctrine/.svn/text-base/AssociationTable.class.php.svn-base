<?php
/**
 * Implements operations on Association table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class AssociationTable extends Doctrine_Table
{
  /**
   * Retrieve an Association row by id
   *
   * @param   integer     $id
   * @return  Association
   */
  public static function getById($id)
  {
    $q = Doctrine_Query::create()
          ->select('a.id')
          ->from('Association a')
          ->where('id = ?', $id)
          ->fetchOne();

    return $q;
  }

  /**
   * Count existing associations
   *
   * @return  integer
   */
  public static function doCount()
  {
    $q = Doctrine_Query::create()
          ->select('a.id')
          ->from('Association a');

    return $q->count();
  }

  /**
   * Retrieve an Association by its name. Useful in tests when we
   * don't know the ID
   *
   * @return Association
   */
  public static function getByName($name)
  {
    $q = Doctrine_Query::create()
          ->from('Association a')
          ->where('a.name = ?', $name);

    return $q->fetchOne();
  }

  /**
   * Retrieve the only one existing Association
   *
   * @return Association
   */
  public static function getUnique()
  {
    $q = Doctrine_Query::create()
          ->from('Association a')
          ->limit('1');

    return $q->fetchOne();
  }

  /**
   * Retrieve pager with list of enabled associations
   *
   * @param   integer         $page
   * @return  Doctrine_Pager
   */
  public static function doSelectAssociations($page)
  {
    $q = Doctrine_Query::create()
          ->from('Association a')
          ->orderBy('a.created_at DESC');
    
    $pager = new sfDoctrinePager('Member', $n);
    $pager->setQuery($q);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }
}