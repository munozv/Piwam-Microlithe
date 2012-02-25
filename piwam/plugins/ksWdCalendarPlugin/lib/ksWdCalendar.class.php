<?php
class ksWdCalendar
{
  /**
   * Convert date from jsCulturedate in mysql format
   * 
   */
  public static function js2PhpTime($js_date, $format = "Us" )
  {
    /*if (preg_match('@(\d+)/(\d+)/(\d+)\s+(\d+):(\d+)@', $js_date, $matches) === 1) {
      if ($culture === 'fr') {
        $date = mktime($matches[4], $matches[5], 0, $matches[2], $matches[1], $matches[3]);
      } else {
        $date = mktime($matches[4], $matches[5], 0, $matches[1], $matches[2], $matches[3]);
      }
    } elseif (preg_match('@(\d+)/(\d+)/(\d+)@', $js_date, $matches) === 1) {
      if ($culture === 'fr') {
        $date = mktime(0, 0, 0, $matches[2], $matches[1], $matches[3]);
      } else {
        $date = mktime(0, 0, 0, $matches[1], $matches[2], $matches[3]);
      }
    } else {
      $date = time();
      //throw new sfException('Impossible de convertir la date : '.$js_date);
    }*/

    $date = Date("U" , strtotime($js_date)) ;
    //$date = Date("Y-m-d H:i:s" , strtotime($js_date)) ;
    
    return $date;
  }
  
  /**
   * Converti une date venant du PHP en date compatible JS
   * @param   string      $js_date    La date venant du PHP
   * @param   string      $culture    La culture de l'utilisateur
   * @return  string                  La date au format JS
   * @access  public
   * @static
   */
  public static function php2JsTime($php_date, $format)
  {
    if(strtotime($php_date)){
      return date($format ,strtotime($php_date)) ;
    } else {
      return date($format ,$php_date) ;
    }

    /*if ($culture === 'fr') {
      $format = 'd/m/Y H:i';
    } else {
      $format = 'm/d/Y H:i';
    }
    
    if ($php_date instanceof DateTime) {
      return $php_date->format($format);
    } else {
      return date($format, $php_date);
    }*/
  }
}