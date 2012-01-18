<?php
/**
 * Provides some DB operations that ORM can't do
 *
 * @author  adrien
 * @since   r100
 */
class DbTools
{
    /*
     * Launch a SQL file (execute all the queries).
     * This is a very simple SQL file executor
     *
     * @param   string          $file
     * @param   PDO             $propelConnection
     * @throw   PDOException    If an error occured in a query
     * @todo    Improve
     */
    public static function executeSQLFile($file, $propelConnection = null)
    {
        $content = file_get_contents($file);
        $queries = explode(';', $content);
        $decode = false;

        if (is_null($propelConnection))
        {
            if (false === mysql_set_charset('utf8'))
            {
                $decode = true;
            }
        }

        foreach ($queries as $query)
        {
            if (trim($query) !== '')
            {
                if (is_null($propelConnection))
                {
                    if ($decode)
                    {
                        mysql_query(utf8_decode($query));
                    }
                    else
                    {
                        mysql_query($query);
                    }
                }
                else
                {
                    $statement = $propelConnection->prepare($query);
                    $statement->execute();
                }
            }
        }
    }

    /**
     * Check if MySQL settings are allright or not
     *
     * @todo extend to others DBMS
     */
    public static function checkMySQLConnection($host, $user, $password, $dbname)
    {
        $link = @mysql_connect($host, $user, $password);

        if (! $link)
        {
            return false;
        }
        else
        {
            $isConnected = mysql_select_db($dbname, $link);

            if ($isConnected)
            {
                return true;
            }
            else
            {
                return false;
            }
        }
    }
}
?>