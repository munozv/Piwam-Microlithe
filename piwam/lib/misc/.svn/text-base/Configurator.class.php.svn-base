<?php
/**
 * The aim of this class is to deal with configuration variables
 *
 * @since   r74
 */
class Configurator
{
  /**
   * Get the value of the configuration variable $v
   *
   * @param   string      $variable
   * @param   integer     $associationId
   * @return  string      Value of the configuration variable, stored as
   *                      string in the database
   * @throw   Exception   if $v is invalid
   */
  public static function get($v, $associationId, $defaultValue = null)
  {
    $configValue = ConfigValueTable::getByCodeForAssociation($v, $associationId);

    if (! $configValue)
    {
      $configVariable = ConfigVariableTable::getByCode($v);

      if (! $configVariable)
      {
        if (is_null($defaultValue))
        {
          throw new Exception('Invalid configuration variable ' . $v);
        }
        else
        {
          return $defaultValue;
        }
      }
      if (is_null($defaultValue))
      {
        return $configVariable->getDefaultValue();
      }
      else
      {
        return $defaultValue;
      }
    }
    else
    {
      return $configValue->getCustomValue();
    }
  }

  /**
   * Set $v (configuration variable) = $value (new value of this variable).
   * We check if the variable really exists
   *
   * @param 	string	$v
   * @param   integer $associationId
   * @param 	string	$value
   * @throw	Exception	if configuration variable doesn't exist
   */
  public static function set($v, $value, $associationId)
  {
    $variable = ConfigVariableTable::getByCode($v);

    if ($variable == null)
    {
      throw new Exception('Variable does not exist : ' . $v);
    }

    $configValue = ConfigValueTable::getByCodeForAssociation($v, $associationId);

    if ($configValue == null)
    {
      $newConfigValue = new ConfigValue();
      $newConfigValue->setConfigVariableId($variable->getId());
      $newConfigValue->setCustomValue($value);
      $newConfigValue->setAssociationId($associationId);
      $newConfigValue->save();
    }
    else
    {
      $configValue->setCustomValue($value);
      $configValue->save();
    }
  }
}
?>