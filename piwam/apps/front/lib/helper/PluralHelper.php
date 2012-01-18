<?php
/**
 * Display a singular / plural noun according to the amount
 * you give as argument ($howMany)
 *
 * @param	integer	$howMany : number of `$word`
 * @param 	string	$word : word you want to display
 * @param	string	$plural : characters that will be append to the word if plural
 * @return 	string
 * @since	r33
 */
function plural_word($howMany, $word, $plural = 's')
{
    if (abs($howMany) <= 1) {
        return $word;
    }
    else {
        return $word . $plural;
    }
}
?>