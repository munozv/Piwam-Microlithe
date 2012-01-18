<?php
/**
 * Embeds and offers some useful string operations
 *
 * @author 	Adrien Mogenet
 * @since	r39
 */
class StringTools
{
  /**
   * Convert a string as alpha numeric string.
   * Accents and non alphanumeric characters are deleted
   *
   * @param 	string		$text
   * @param 	string 		$from_enc
   * @return 	string :	clean result
   * @since	r39
   * @see 	http://www.3gk-software.com/Traitement-des-chaines-de-caracteres/PHP-Supprimer-les-accents-et-les-caracteres-speciaux.html
   */
  public static function to7bit($text, $from_enc = 'UTF-8')
  {
    $text = mb_convert_encoding($text, 'HTML-ENTITIES', $from_enc);
    $text = preg_replace(array('/ß/','/&(..)lig;/', '/&([aouAOU])uml;/','/&(.)[^;]*;/'),
                         array('ss',"$1","$1".'e',"$1"), $text);
    $result = eregi_replace("[^a-z0-9 ]",'',$text);

    return $result;
  }

  /**
   * Generate a random password, without double chars
   *
   * @param   integer     $length
   * @return  string
   * @since   r154
   */
  public static function generatePassword($length = 8)
  {
    $password = "";
    $possible = "0123456789bcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ+-_?!";

    for ($i = 0; $i < $length; ++$i)
    {
      $char = substr($possible, mt_rand(0, strlen($possible) - 1), 1);
      
      if (! strstr($password, $char))
      {
        $password .= $char;
      }
      else
      {
        if ($length < strlen($possible))
        {
          $i--;
        }
      }
    }

    return $password;
  }

  /**
   * Return a "URL friendly" name of $value, without special
   * character, space, etc.
   *
   * @param   string  $value
   * @param   string  $replacement
   * @return  string
   * @since   1.2
   */
  public static function slugify($value, $replacement = '_')
  {
    $slug = strtolower(trim($value));
    $slug = preg_replace('/[^a-z0-9-]/', $replacement, $slug);
    $slug = preg_replace('/-+/', $replacement, $slug);

    return $slug;
  }
}
?>