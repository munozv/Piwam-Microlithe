<?php
/**
 * Implements operations on AclCredential table (credentials that are
 * given to a Member)
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class AclCredentialTable extends Doctrine_Table
{
  /**
   * Retrieve Credentials for member $id
   *
   * @param   integer   $id
   * @return  array of AclCredential
   */
  public static function getForMember($id)
  {
    $q = Doctrine_Query::create()
          ->select('a.code, c.member_id')
          ->from('AclCredential c')
          ->leftJoin('c.AclAction a')
          ->where('c.member_id = ?', $id);

    return $q->execute();
  }
}