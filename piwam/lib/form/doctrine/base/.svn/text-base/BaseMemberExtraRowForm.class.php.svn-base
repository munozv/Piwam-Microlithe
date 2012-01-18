<?php

/**
 * MemberExtraRow form base class.
 *
 * @method MemberExtraRow getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseMemberExtraRowForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'association_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Association'), 'add_empty' => false)),
      'label'          => new sfWidgetFormInputText(),
      'description'    => new sfWidgetFormTextarea(),
      'type'           => new sfWidgetFormInputText(),
      'default_value'  => new sfWidgetFormInputText(),
      'slug'           => new sfWidgetFormInputText(),
      'parameters'     => new sfWidgetFormInputText(),
      'required'       => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'association_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Association'))),
      'label'          => new sfValidatorString(array('max_length' => 255)),
      'description'    => new sfValidatorString(array('required' => false)),
      'type'           => new sfValidatorString(array('max_length' => 255)),
      'default_value'  => new sfValidatorString(array('max_length' => 255)),
      'slug'           => new sfValidatorString(array('max_length' => 255)),
      'parameters'     => new sfValidatorString(array('max_length' => 255, 'required' => false)),
      'required'       => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('member_extra_row[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberExtraRow';
  }

}
