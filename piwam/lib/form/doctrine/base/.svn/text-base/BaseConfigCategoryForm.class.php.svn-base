<?php

/**
 * ConfigCategory form base class.
 *
 * @method ConfigCategory getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseConfigCategoryForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'  => new sfWidgetFormInputHidden(),
      'label' => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'code'  => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'code', 'required' => false)),
      'label' => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('config_category[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigCategory';
  }

}
