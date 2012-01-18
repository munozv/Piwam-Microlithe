<?php
/**
 * Display a nice tooltip "balloon".
 *
 * Based on BoxOver
 *
 * @param	string	$header : text which will be displayed as header in tooltip
 * @param	string	$body : text which will be displayed as body in tooltip
 * @param	string	$linkText : link to display
 * @param	string	$array : possible parameters as they've been defined on
 * 							 boxover websierve
 * @return	string
 * @see 	http://boxover.swazz.org/
 * @since	r26
 * @todo	Implements parameters
 */

function tooltip_tag($header, $body, $linkText = null, $params = null)
{
    sfContext::getInstance()->getConfiguration()->loadHelpers('Asset');
    $result = '<a href="#" title="header=[' . $header . '] body=[' . $body . ']">';

    if (is_null($linkText))
    {
        $result .= image_tag("tooltip_icon.gif", array('align' => 'absmiddle', 'alt' => 'Aide'));
    }
    else
    {
        $result .= $linkText;
    }

    $result .= '</a>';

    return $result;
}

?>