<?php
/**
 * Allows to edit file easily
 *
 * @author 	Adrien Mogenet
 * @since	r82
 */
class FileModifier
{
    private $_filename			= "";
    private $_content			= array();
    private $_numberOfLines 	= 0;
    private $_currentLine 		= 0;

    /**
     * Ctor
     *
     * @param 	string	$filename
     * @throws	Exception if file not found
     */
    public function __construct($filename)
    {
        $this->reloadContent($filename);
    }

    /**
     * Reset cursor position
     *
     */
    public function resetCursor()
    {
        $this->_currentLine = 0;
    }

    /**
     * Write all modification to the file
     *
     */
    public function flush()
    {
        $fo = fopen($this->_filename, "r+b");
        for ($l = 0; $l < $this->_numberOfLines; $l++) {
            fwrite($fo, $this->_content[$l]);
        }
        fclose ($fo);
    }

    /**
     * Reload content of $filename into an array
     *
     * @param 	string	$filename
     * @throws	FileNotFoundException
     */
    public function reloadContent($filename)
    {
        $this->_filename = $filename;
        $this->_content = file($filename);

        if ($this->_content == false) {
            throw new FileNotFoundException('File not found : ' . $filename);
        }
        else {
            $this->_numberOfLines = count($this->_content);
        }
    }

    /**
     * Reach the first/next line which begins by $pattern
     *
     * @param 	string	$pattern pattern to find
     * @return 	integer	line number. false if not found
     */
    public function searchLineBeginningBy($pattern)
    {
        for (; $this->_currentLine < $this->_numberOfLines; $this->_currentLine++)
        {
            $line = $this->_content[$this->_currentLine];
            $line = substr(trim($line), 0, strlen($pattern));

            if ($line == $pattern) {
                return $this->_currentLine;
            }
        }
        return false;
    }

    /**
     * Set new content $content for the line $lineNumber
     *
     * @param 	integer	$lineNumber
     * @param 	string	$content
     * @param	boolean	$saveSpaces if true, we write spaces according to the oldline
     * @return	string	old content
     * @throws	Exception if invalid line number
     */
    public function setLineContent($lineNumber, $content, $saveSpaces = false)
    {
        if (($lineNumber < 0) || ($lineNumber > $this->_numberOfLines - 1)) {
            throw new Exception('Invalid line number: ' . $lineNumber);
        }

        $oldContent = $this->_content[$lineNumber];
        $this->_content[$lineNumber] = '';

        if ($saveSpaces)
        {
            for ($i = 0; $i < strlen($oldContent); $i++)
            {
                if (ctype_space($oldContent[$i])) {
                    $this->_content[$lineNumber] .= $oldContent[$i];
                }
                else {
                    // once we reach a char which is not a space,
                    // we leave the loop
                    $i = strlen($oldContent);
                }
            }
        }

        $this->_content[$lineNumber] .= $content . PHP_EOL;

        return $oldContent;
    }
}
?>