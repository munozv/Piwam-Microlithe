<?php
/*
 * This file is part of the piwam package.
 * (c) Adrien Mogenet <adrien.mogenet@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Operations which deal with other Model files
 *
 * @package     piwam
 * @subpackage  model
 * @author      Adrien
 * @since       1.2
 */
class PiwamOperations
{

  /**
   * Checks if Piwam is alreay installed. It's currently based on SQL
   * configuration, and check if piwam tables are present or not. This method
   * has been set as static because other foregin methods may want to check
   * if Piwam has been properly installed (ie: default module/action)
   *
   * @return boolean
   */
  public static function isInstalled()
  {
    try
    {
      Doctrine_Manager::connection();
      AssociationTable::doCount();
      ConfigVariableTable::doCount();
      MemberTable::doCount();
      StatusTable::doCount();
      AccountTable::doCount();
      DueTable::doCount();
      DueTypeTable::doCount();
      IncomeTable::doCount();
      ExpenseTable::doCount();
      
      if (AclActionTable::doCount() < 38)
      {
        return false;
      }

      if (ConfigVariableTable::doCount() < 10)
      {
        return false;
      }

      return true;
    }
    catch (Doctrine_Connection_Exception $e)
    {
      return false;
    }
  }
}
?>
