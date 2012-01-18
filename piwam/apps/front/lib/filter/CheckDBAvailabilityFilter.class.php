<?php
/**
 * Checks the availability of the working database, and redirects
 * to a module if it is not reachable.
 *
 * @since 1.2
 * @see   http://www.funstaff.ch
 */
class CheckDBAvailabilityFilter extends sfFilter
{
  /**
   * The destination module that will be reached if database
   * is not available
   *
   * @var string
   */
  const MODULE = 'install';

  /**
   * The destination action that will be called if database
   * is not reachable
   *
   * @var string
   */
  const ACTION = 'index';

  /**
   * Checks availability of databases according to the Doctrine
   * connection's names defined in configuration files
   *
   * @param   sfFilterChain  $filterChain
   * @return  sfFilterChain
   */
  public function execute(sfFilterChain $filterChain)
  {
    if ($this->isFirstCall())
    {
      $context = $this->getContext();

      if ((self::MODULE != $context->getModuleName()))
      {
        $configuration = sfProjectConfiguration::getActive();
        $db = new sfDatabaseManager($configuration);

        foreach ($db->getNames() as $connection)
        {
          try
          {
            @$db->getDatabase($connection)->getConnection();
          }
          catch(Exception $e)
          {
             $context->getController()->forward(self::MODULE, self::ACTION);
             
             exit;
          }
        }
      }
    }

    $filterChain->execute();
  }
}
?>
