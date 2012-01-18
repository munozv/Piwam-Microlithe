<?php
/**
 * This classi s able to manage parameters in different types : arrays,
 * sfParameterHolder...
 *
 * @since   r71
 */
class ParamsTools
{
    /**
     * Get a value within an associative array if this valus has been set
     *
     * @param   array   $array
     * @param   Mixed   $key        Key of the value to return
     * @param   Mixed   $default    Default returned value if not set
     * @return  Mixed
     */
    public static function get_ifset($array, $key, $default = false)
    {
        if (isset($array[$key])) {
            return $array[$key];
        }
        else {
            return $default;
        }
    }
}
?>