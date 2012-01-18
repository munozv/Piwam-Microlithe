<?php
/**
 * All the following helpers are usefull to efficiently
 * display all boolean states.
 *
 * @since	r14
 */

/**
 * Transforms the boolean value to an icon
 *
 * @param 	boolean	$state
 * @return 	string
 * @since   r14
 */
function boolean2icon($state)
{
    sfContext::getInstance()->getConfiguration()->loadHelpers('Asset');

    if ($state)
    {
      return image_tag('state_ok.png', array('alt' => 'Ok'));
    }
    else
    {
      return image_tag('state_ko.png', array('alt' => 'Ko'));
    }
}
?>