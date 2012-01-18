<?php

/**
 * Expense filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseExpenseFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'label'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'amount'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'association_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Association'), 'add_empty' => true)),
      'account_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Account'), 'add_empty' => true)),
      'activity_id'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Activity'), 'add_empty' => true)),
      'date'           => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'paid'           => new sfWidgetFormFilterInput(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member_5'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'label'          => new sfValidatorPass(array('required' => false)),
      'amount'         => new sfValidatorSchemaFilter('text', new sfValidatorNumber(array('required' => false))),
      'association_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Association'), 'column' => 'id')),
      'account_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Account'), 'column' => 'id')),
      'activity_id'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Activity'), 'column' => 'id')),
      'date'           => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'paid'           => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member'), 'column' => 'id')),
      'updated_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member_5'), 'column' => 'id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('expense_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Expense';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'label'          => 'Text',
      'amount'         => 'Number',
      'association_id' => 'ForeignKey',
      'account_id'     => 'ForeignKey',
      'activity_id'    => 'ForeignKey',
      'date'           => 'Date',
      'paid'           => 'Number',
      'created_by'     => 'ForeignKey',
      'updated_by'     => 'ForeignKey',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
