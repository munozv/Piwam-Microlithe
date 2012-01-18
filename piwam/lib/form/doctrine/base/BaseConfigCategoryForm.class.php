<?php

/**
 * ConfigCategory form base class.
 *
 * @method ConfigCategory getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
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
      'code'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('code')), 'empty_value' => $this->getObject()->get('code'), 'required' => false)),
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
