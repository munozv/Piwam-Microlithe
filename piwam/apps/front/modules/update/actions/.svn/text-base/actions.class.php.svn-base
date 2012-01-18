<?php
/**
 * Manage the update of Piwam versions
 *
 * @package    piwam
 * @subpackage update
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class updateActions extends sfActions
{
  /**
   * Locates the folder which has the files to update SQL model
   *
   * @var string
   */
  const SQL_DIR = '../data/updates/';

  /**
   * Defines success code if everything went fine
   *
   * @var integer
   */
  const PERFORM_SUCCESS = 1;

  /**
   * Defines error code if an error occured while getting SQL files or
   * executing these files
   *
   * @var integer
   */
  const PERFORM_ERROR = 2;

  /**
   * Defines code if current version is the last available version
   *
   * @var integer
   */
  const CHECK_VERSION_OK = 1;

  /**
   * Defines error code if we can't check the last version with
   * online webservice
   *
   * @var integer
   */
  const CHECK_VERSION_ERROR = 2;

  /**
   * Executes index action
   *
   * @param   sfRequest $request A request object
   * @todo    Set a dynamic $current variable
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->currentDBVersion = DataTable::getByKey('dbversion');
    $this->files = $this->_checkSQLFilesSince($this->currentDBVersion);

    if (ini_get('allow_url_fopen'))
    {
      $result = file_get_contents('http://piwam.frenchcomp.net/piwamversionner.php?auth=Piwam&current=112');

      if ($result === false)
      {
        $this->lastVersion = self::CHECK_VERSION_ERROR;
      }
      elseif ($result == 'OK')
      {
        $this->lastVersion = self::CHECK_VERSION_OK;
      }
      else
      {
        $this->lastVersion = $result;
      }
    }
    else
    {
      $this->lastVersion = self::CHECK_VERSION_ERROR;
    }
  }

  /**
   * Perform the update : execute SQL files
   *
   * @param sfWebRequest $request
   */
  public function executePerform(sfWebRequest $request)
  {
    $this->currentDBVersion = DataTable::getByKey('dbversion');
    $performResult = $this->_checkSQLFilesSince($this->currentDBVersion, true);

    if ($performResult === self::PERFORM_ERROR)
    {
      return sfView::ERROR;
    }
    else
    {
      $this->getContext()->getConfigCache()->clear();
    }
  }

  /*
   * Look for SQL files to execute since version $version
   * All SQL files have to be in /data/updates/* folder
   *
   * We launch queries within transactions, to keep consistence of
   * the DB
   *
   * @todo  Change for Doctrine connection
   */
  private function _checkSQLFilesSince($version, $execute = false)
  {
    $sqlFiles = array();

    try
    {
      $d = dir(self::SQL_DIR);
      chdir (self::SQL_DIR);
    }
    catch (Exception $e)
    {
      $this->error = $e;

      return self::PERFORM_ERROR;
    }

    while($entry = $d->read())
    {
      /*
       * We browse directories that have been put into SQL_DIR
       */
      if ((is_dir($entry)) && ($this->_isPiwamDir($entry)))
      {
        $sqlDir = dir($entry);
        chdir($entry);

        while ($file = $sqlDir->read())
        {
          if ($this->_isValidSQLfile($file, $version))
          {
            $sqlFiles[] = self::SQL_DIR . $entry . '/' . $file;

            if ($execute)
            {
              $propelConnection = Propel::getConnection();
              try
              {
                $propelConnection->beginTransaction();
                DbTools::executeSQLFile($file, $propelConnection);
                $newVersion = $this->_getVersionFromFile($file);
                PiwamDataPeer::set('dbversion', $newVersion);
                $propelConnection->commit();
              }
              catch (PDOException $e)
              {
                $propelConnection->rollback();
                $this->error = $e;

                return self::PERFORM_ERROR;
              }
            }
          }
        }

        $sqlDir->close();
        chdir('..');
      }
    }
    $d->close();

    return $sqlFiles;
  }

  /*
   * Check if $dir is Piwam directory (not .svn, '.' or '..', etc)
   * So we check if the first char is a dot
   */
  private function _isPiwamDir($dir)
  {
    return $dir[0] !== '.';
  }

  /*
   * Check if $file is a SQL file to execute. Filenames have to follow this
   * format : rXYZ.sql
   * where XYZ is the version number. Otherwise, file won't be checked.
   * SQL files will be executed if XYZ > $currentVersion
   */
  private function _isValidSQLfile($file, $currentVersion)
  {
    $version = $this->_getVersionFromFile($file);

    if (false === $version)
    {
      return false;
    }
    else
    {
      return $version > $currentVersion;
    }
  }

  /*
   * Get the DB version of the file $file.
   * Returns false if this not a rXYZ.sql file
   */
  private function _getVersionFromFile($file)
  {
    $a = explode('.', $file);

    if (count($a) != 2)
    {
      return false;
    }
    else
    {
      $filename  = $a[0];
      $extension = $a[1];

      if ($extension === 'sql')
      {
        $explode = explode('r', $a[0]);

        if (count($explode) !== 2)
        {
          return false;
        }
        else
        {
          $version = $explode[1];

          if (is_numeric($version))
          {
            return intval($version);
          }
        }
      }
    }
  }
}
