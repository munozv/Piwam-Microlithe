<?php

/**
 * ConfigValue form base class.
 *
 * @method ConfigValue getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseConfigValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'config_variable_id' => new sfWidgetFormInputHidden(),
      'association_id'     => new sfWidgetFormInputHidden(),
      'custom_value'       => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'config_variable_id' => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'config_variable_id', 'required' => false)),
      'association_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'association_id', 'required' => false)),
      'custom_value'       => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('config_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigValue';
  }

}
