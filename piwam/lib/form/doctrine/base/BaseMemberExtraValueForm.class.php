<?php

/**
 * MemberExtraValue form base class.
 *
 * @method MemberExtraValue getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseMemberExtraValueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'row_id'     => new sfWidgetFormInputHidden(),
      'member_id'  => new sfWidgetFormInputHidden(),
      'value'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'row_id'     => new sfValidatorChoice(array('choices' => array($this->getObject()->get('row_id')), 'empty_value' => $this->getObject()->get('row_id'), 'required' => false)),
      'member_id'  => new sfValidatorChoice(array('choices' => array($this->getObject()->get('member_id')), 'empty_value' => $this->getObject()->get('member_id'), 'required' => false)),
      'value'      => new sfValidatorString(array('max_length' => 255)),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('member_extra_value[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberExtraValue';
  }

}
