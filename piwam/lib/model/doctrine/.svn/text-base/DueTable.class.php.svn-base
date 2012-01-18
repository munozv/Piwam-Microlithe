<?php
/**
 * Implements operations on Due table
 *
 * @package     piwam
 * @subpackage  model
 * @since       1.2
 * @author      adrien
 */
class DueTable extends Doctrine_Table
{
  /**
   * Retrieve a Due object by its id
   *
   * @param   integer $id
   * @return  Due
   */
  public static function getById($id)
  {
    $q = Doctrine_Query::create()
          ->from('Due d')
          ->where('d.id = ?', $id);

    return $q->fetchOne();
  }

  /**
   * Retrieve Dues paid by member $id
   *
   * @param   integer       $id
   * @return  array of Due
   */
  public static function getForUser($id)
  {
    $q = Doctrine_Query::create()
          ->from('Due d')
          ->where('d.member_id = ?', $id);

    return $q->execute();
  }

  /**
   * Retrieve list of dues in association $id
   *
   * @param   integer       $id
   * @return  array of Due
   */
  public static function getForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->from('Due d')
          ->leftJoin('d.DueType t')
          ->where('t.association_id = ?', $id)
          ->orderBy('d.date DESC');

    return $q->execute();
  }

  /**
   * Get sum of Dues for association $id
   *
   * @param   integer     $id
   * @return  integer
   */
  public static function getSumForAssociation($id)
  {
    $q = Doctrine_Query::create()
          ->select('SUM(d.amount) AS total')
          ->from('Due d')
          ->leftJoin('d.DueType t')
          ->where('t.association_id = ?', $id)
          ->groupBy('t.association_id');

    $row = $q->fetchArray();

    return (count($row)) ? $row[0]['total'] : 0;
  }

  /**
   * Get sum of Dues for account $id
   *
   * @param   integer     $id
   * @return  integer
   */
  public static function getSumForAccount($id)
  {
    $q = Doctrine_Query::create()
          ->select('SUM(d.amount) AS total')
          ->from('Due d')
          ->where('d.account_id = ?', $id)
          ->groupBy('d.account_id');

    $row = $q->fetchArray();

    return (count($row)) ? $row[0]['total'] : 0;
  }

  /**
   * Count existing Due
   *
   * @return  integer
   */
  public static function doCount()
  {
    $q = Doctrine_Query::create()
          ->select('d.id')
          ->from('Due d');

    return $q->count();
  }

  /**
   * Get sfDoctrinePager to paginate list of Dues
   *
   * @param   integer         $id
   * @param   integer         $page
   * @return  sfDoctrinePager
   */
  public static function getPagerEnabledForAssociation($id, $page = 1)
  {
    $q = Doctrine_Query::create()
          ->from('Due d')
          ->leftJoin('d.DueType t')
          ->where('t.association_id = ?', $id)
          ->orderBy('d.date DESC');

    $pager = new sfDoctrinePager('Due', 50);
    $pager->setQuery($q);
    $pager->setPage($page);
    $pager->init();

    return $pager;
  }

  /**
   * Get the last due paid by the member $id
   *
   * @param   integer       $id
   * @return  Due           The last paid due
   */
  public static function getLastForMember($id)
  {
    $q = Doctrine_Query::create()
          ->from('Due d')
          ->where('d.member_id = ?', $id)
          ->orderBy('d.date DESC')
          ->limit(1);

    return $q->fetchOne();
  }
}