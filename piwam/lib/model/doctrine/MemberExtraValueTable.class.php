<?php
/**
 * Implements operation of MemberExtraValue table
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien Mogenet
 * @since       1.2
 */
class MemberExtraValueTable extends Doctrine_Table
{
  /**
   * Get the value of the row $rowId for the member $memberId
   *
   * @param   integer           $rowId
   * @param   integer           $memberId
   * @return  MemberExtraValue
   */
  public static function getValueForMember($rowId, $memberId)
  {
    $q = Doctrine_Query::create()
          ->from('MemberExtraValue v')
          ->where('row_id = ?', $rowId)
          ->andWhere('member_id = ?', $memberId)
          ->limit(1);

    return $q->fetchOne();
  }
}
