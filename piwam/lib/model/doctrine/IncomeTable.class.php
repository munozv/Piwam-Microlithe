<?php
/**
 * Implements operations on Income table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class IncomeTable extends Doctrine_Table
{
  /**
   * Retrieve list of income for association $id. Used in export
   * feature.
   * 
   * @param   integer     $id 
   * @return  array of Income
   */
  public static function getForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->from('Income i')
          ->where('i.association_id = ?', $id);

    return $q->execute();
  }

  /**
   * Get the amount of unpaid expenses by association $id
   *
   * @param   integer     $id
   * @return  integer
   */
  public static function getAmountOfDebtsForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->select('SUM(i.amount) AS total')
          ->from('Income i')
          ->where('i.association_id = ?', $id)
          ->andWhere('i.received = ?', false)
          ->groupBy('i.association_id');

    $row = $q->fetchArray();

    if (count($row))
    {
      return $row[0]['total'];
    }
    else
    {
      return 0;
    }
  }

  /**
   * Retrieve enabled expenses for association $id
   *
   * @param   integer           $id
   * @return  array of Income
   * @todo    Customize number of results per page, add filters
   */
  public static function getPagerForAssociation($id, $page = 1)
  {
    $q = Doctrine_Query::create()
          ->from('Income i')
          ->where('i.association_id = ?', $id);

    $pager = new sfDoctrinePager('Income', 20);
    $pager->setQuery($q);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }

  /**
   * Retrieve an expense by its id
   *
   * @param   integer $id
   * @return  Income
   */
  public static function getById($id)
  {
    $q = Doctrine_Query::create()
          ->from('Income i')
          ->where('i.id = ?', $id);

    return $q->fetchOne();
  }

  /**
   * Get amount of unreceived Incomes for association $id
   * @param     integer $id
   * @return    integer
   */
  public static function getAmountOfDebtsForActivity($id)
  {
      $q = Doctrine_Query::create()
          ->select('SUM(i.amount) AS total')
          ->from('Income i')
          ->leftJoin('i.Activity a')
          ->where('a.id = ?', $id)
          ->andWhere('i.received = ?', false)
          ->groupBy('a.id');

    $row = $q->fetchArray();

    return (count($row)) ? $row[0]['total'] : 0;
  }

  /**
   * Count existing Income
   *
   * @return  integer
   */
  public static function doCount()
  {
    $q = Doctrine_Query::create()
          ->select('i.id')
          ->from('Income i');

    return $q->count();
  }
}