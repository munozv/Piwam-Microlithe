<?php
/**
 * Provides an easy way to export contents into a file. This class uses
 * the ``ob`` buffers to perform.
 * Basical works is the following :
 *
 *      1) Open a new buffer session
 *      2) The user can write everything he wants
 *      3) We perform the file export
 *
 * @see     http://fr.php.net/manual/fr/book.outcontrol.php
 * @author  Adrien Mogenet <adrien.mogenet@chilipoker.com>
 * @since   r15
 */
class FileExporter
{
    private $_filename      = '';
    private $_isBufferOpen  = false;
    private $_mimeType      = '';
    private $_csvSeparator	= ',';


    /**
     * Default ctor. Can take a filename and the associated MIME type as
     * arguments.
     *
     * @param   string  $filename
     * @param   string  $mimeType The MIME type
     */
    public function __construct($filename = 'no-name', $mimeType = 'application/text')
    {
        $this->setFilename($filename);
        $this->setMimeType($mimeType);
        $this->startSession();
    }

    /**
     * Set the result filename
     *
     * @param   string  $filename
     */
    public function setFilename($filename)
    {
        $this->_filename = $filename;
    }

    /**
     * Set the MIME type of the result file.
     *
     * @param   string $mimeType
     */
    public function setMimeType($mimeType)
    {
        $this->_mimeType = $mimeType;
    }

    /**
     * Start the new buffering session
     */
    public function startSession()
    {
        if ($this->_isBufferOpen == false) {
            //ob_end_clean();
            ob_start();
            $this->_isBufferOpen = true;
        }
    }

    /**
     * Performs the export of the file. We disable the error reporting
     * during the release in order to avoid useless messages in the result
     * file.
     */
    public function exportContentAsFile()
    {
        $oldErrorLevel = error_reporting(0);
        ini_set('zlib.output_compression', 0);
        error_reporting($oldErrorLevel);
        define('CFG_SEND_FILENAME', $this->_filename);
        define('CFG_DATE_FORMAT', 'D, d M Y H:i:s');
        header('Pragma: public');
        header('Last-Modified: ' . gmdate(CFG_DATE_FORMAT) . ' GMT');
        header('Cache-Control: must-revalidate, pre-check=0, post-check=0, max-age=0');
        header('Content-Tranfer-Encoding: none');
        header('Content-type: ' . $this->_mimeType);
        header('Content-Disposition: attachment; filename="' . CFG_SEND_FILENAME . '"');
        header('Date: ' . gmdate(CFG_DATE_FORMAT, time()) . ' GMT');
        header('Expires: ' . gmdate(CFG_DATE_FORMAT, time()+1) . ' GMT');
        header('Last-Modified: ' . gmdate(CFG_DATE_FORMAT, time()) . ' GMT');
        ob_end_flush();
        $this->_isBufferOpen = false;

        exit();
    }

    /**
     * Return a secure string to insert in a CSV file
     */
    public function addCellCSV($cell)
    {
        return '"'.addcslashes($cell, '"\\').'"';
    }

    /**
     * Set the symbol which will be used as CSV separator
     *
     * @param 	string	$separator
     * @return 	string	old value
     */
    public function setCSVSeparator($separator)
    {
        $old = $this->_csvSeparator;
        $this->_csvSeparator = $separator;

        return $old;
    }

    /**
     * Returns a valid and secure CSV line
     *
     * @param 	array	$line ; array of strings (cells)
     * @return 	string
     */
    public function addLineCSV($line)
    {
        $result = "";
        foreach ($line as $cell) {
            $result .= $this->addCellCSV($cell);
            $result .= $this->_csvSeparator;
        }
        $result .= PHP_EOL;

        return $result;
    }
}
?>
