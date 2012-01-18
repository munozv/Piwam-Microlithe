<?php

/**
 * Account filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseAccountFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'label'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'association_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Association'), 'add_empty' => true)),
      'reference'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'state'          => new sfWidgetFormFilterInput(),
      'created_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'updated_by'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member_3'), 'add_empty' => true)),
      'created_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'     => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'label'          => new sfValidatorPass(array('required' => false)),
      'association_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Association'), 'column' => 'id')),
      'reference'      => new sfValidatorPass(array('required' => false)),
      'state'          => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member'), 'column' => 'id')),
      'updated_by'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member_3'), 'column' => 'id')),
      'created_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'     => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('account_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Account';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'label'          => 'Text',
      'association_id' => 'ForeignKey',
      'reference'      => 'Text',
      'state'          => 'Number',
      'created_by'     => 'ForeignKey',
      'updated_by'     => 'ForeignKey',
      'created_at'     => 'Date',
      'updated_at'     => 'Date',
    );
  }
}
