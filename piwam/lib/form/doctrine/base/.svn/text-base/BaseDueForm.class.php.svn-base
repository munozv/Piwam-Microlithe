<?php

/**
 * Due form base class.
 *
 * @method Due getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseDueForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'account_id'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Account'), 'add_empty' => false)),
      'due_type_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('DueType'), 'add_empty' => false)),
      'member_id'   => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => false)),
      'date'        => new sfWidgetFormDate(),
      'amount'      => new sfWidgetFormInputText(),
      'created_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedByMember'), 'add_empty' => true)),
      'updated_by'  => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedByMember'), 'add_empty' => true)),
      'created_at'  => new sfWidgetFormDateTime(),
      'updated_at'  => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'account_id'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Account'))),
      'due_type_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('DueType'))),
      'member_id'   => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'))),
      'date'        => new sfValidatorDate(),
      'amount'      => new sfValidatorNumber(),
      'created_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedByMember'), 'required' => false)),
      'updated_by'  => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedByMember'), 'required' => false)),
      'created_at'  => new sfValidatorDateTime(),
      'updated_at'  => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('due[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Due';
  }

}
