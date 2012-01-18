<?php
/**
 * Manage actions of fcLogAnalyzerPlugin
 *
 * @author Adrien Mogenet
 */
class fcLogAnalyzerActions extends sfActions
{
    /**
     * Display the list of viewable logs
     *
     * @param   sfWebRequest $request
     */
    public function executeIndex(sfWebRequest $request)
    {
        $this->logs = fcLogBrowser::getLogFiles();
    }

    /**
     * View details of a particular log file
     *
     * @param   sfWebRequest    $request
     */
    public function executeViewLog(sfWebRequest $request)
    {
        $parser = new fcLogParser('file.log');
        $this->lines = $parser->getLines();
    }
}