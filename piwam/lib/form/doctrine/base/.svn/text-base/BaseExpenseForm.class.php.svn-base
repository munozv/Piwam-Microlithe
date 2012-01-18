<?php

/**
 * Expense form base class.
 *
 * @method Expense getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseExpenseForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'             => new sfWidgetFormInputHidden(),
      'label'          => new sfWidgetFormInputText(),
      'amount'         => new sfWidgetFormInputText(),
      'association_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Association'), 'add_empty' => false)),
      'account_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Account'), 'add_empty' => false)),
      'activity_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => false)),
      'date'           => new sfWidgetFormDate(),
      'paid'           => new sfWidgetFormInputCheckbox(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedByMember'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedByMember'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormDateTime(),
      'updated_at'     => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'             => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'label'          => new sfValidatorString(array('max_length' => 255)),
      'amount'         => new sfValidatorNumber(),
      'association_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Association'))),
      'account_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Account'))),
      'activity_id'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'))),
      'date'           => new sfValidatorDate(),
      'paid'           => new sfValidatorBoolean(array('required' => false)),
      'created_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CreatedByMember'), 'required' => false)),
      'updated_by'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('UpdatedByMember'), 'required' => false)),
      'created_at'     => new sfValidatorDateTime(),
      'updated_at'     => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('expense[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Expense';
  }

}
