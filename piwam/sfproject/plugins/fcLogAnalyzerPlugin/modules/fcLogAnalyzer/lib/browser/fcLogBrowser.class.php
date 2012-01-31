<?php
/**
 * Get existing logs
 *
 * @author  Adrien Mogenet
 * @package fcLogAnalyzer
 */
class fcLogBrowser
{
    /**
     * Get the list of files to parse
     *
     * @param   string  $root   Root directory to browse
     * @return  array           Array of files which can be parsed
     */
    public static function getLogFiles($root = null)
    {
        $result = array();

        if (null === $root)
        {
            $root = '../log/';
        }

        try
        {
            $d = dir($root);

            while ($entry = $d->read())
            {
                $result[] = $entry;
            }
        }
        catch (Exception $e)
        {

        }

        return $result;
    }
}