<?php

/**
 * ConfigVariable form base class.
 *
 * @method ConfigVariable getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseConfigVariableForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'code'          => new sfWidgetFormInputText(),
      'category_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConfigCategory'), 'add_empty' => false)),
      'label'         => new sfWidgetFormInputText(),
      'description'   => new sfWidgetFormTextarea(),
      'type'          => new sfWidgetFormInputText(),
      'default_value' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'code'          => new sfValidatorString(array('max_length' => 25)),
      'category_code' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('ConfigCategory'))),
      'label'         => new sfValidatorString(array('max_length' => 255)),
      'description'   => new sfValidatorString(array('required' => false)),
      'type'          => new sfValidatorString(array('max_length' => 255)),
      'default_value' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('config_variable[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigVariable';
  }

}
