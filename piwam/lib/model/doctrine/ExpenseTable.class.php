<?php
/**
 * Implements operations on Expense table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class ExpenseTable extends Doctrine_Table
{
  /**
   * Retrieve list of expenses for association $id
   *
   * @param   integer         $id
   * @return  array of Expense
   */
  public static function getForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->from('Expense e')
          ->where('e.association_id = ?', $id);

    return $q->execute();
  }

  /**
   * Retrieve enabled expenses for association $id
   *
   * @param   integer           $id
   * @return  array of Expense
   * @todo    Customize number of results per page, add filters
   */
  public static function getPagerForAssociation($id, $page = 1)
  {
    $q = Doctrine_Query::create()
          ->from('Expense e')
          ->where('e.association_id = ?', $id);

    $pager = new sfDoctrinePager('Expense', 20);
    $pager->setQuery($q);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }

  /**
   * Retrieve an expense by its id
   *
   * @param   integer $id
   *
   * @return  Expense
   */
  public static function getById($id)
  {
    $q = Doctrine_Query::create()
          ->from('Expense e')
          ->where('e.id = ?', $id);

    return $q->fetchOne();
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
          ->select('SUM(e.amount) AS total')
          ->from('Expense e')
          ->where('e.association_id = ?', $id)
          ->andWhere('e.paid = ?', false)
          ->groupBy('e.association_id');

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
   * Get amount of unpaid Expenses for activity $id
   *
   * @param   integer $id
   * @return  integer
   */
  public static function getAmountOfDebtsForActivity($id)
  {
      $q = Doctrine_Query::create()
          ->select('SUM(e.amount) AS total')
          ->from('Expense e')
          ->leftJoin('e.Activity a')
          ->where('a.id = ?', $id)
          ->andWhere('e.paid = ?', false)
          ->groupBy('a.id');

    $row = $q->fetchArray();

    return (count($row)) ? $row[0]['total'] : 0;
  }

  /**
   * Count existing Expenses
   *
   * @return  integer
   */
  public static function doCount()
  {
    $q = Doctrine_Query::create()
          ->select('e.id')
          ->from('Expense e');

    return $q->count();
  }
}