<?php

/**
 * ConfigValue form base class.
 *
 * @method ConfigValue getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
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
      'config_variable_id' => new sfValidatorChoice(array('choices' => array($this->getObject()->get('config_variable_id')), 'empty_value' => $this->getObject()->get('config_variable_id'), 'required' => false)),
      'association_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('association_id')), 'empty_value' => $this->getObject()->get('association_id'), 'required' => false)),
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
