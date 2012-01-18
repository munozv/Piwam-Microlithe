<?php

/**
 * Member filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseMemberFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'lastname'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'firstname'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'username'          => new sfWidgetFormFilterInput(),
      'password'          => new sfWidgetFormFilterInput(),
      'status_id'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'subscription_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'due_exempt'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'street'            => new sfWidgetFormFilterInput(),
      'zipcode'           => new sfWidgetFormFilterInput(),
      'city'              => new sfWidgetFormFilterInput(),
      'country'           => new sfWidgetFormFilterInput(),
      'picture'           => new sfWidgetFormFilterInput(),
      'email'             => new sfWidgetFormFilterInput(),
      'website'           => new sfWidgetFormFilterInput(),
      'phone_home'        => new sfWidgetFormFilterInput(),
      'phone_mobile'      => new sfWidgetFormFilterInput(),
      'state'             => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'association_id'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_by'        => new sfWidgetFormFilterInput(),
      'updated_by'        => new sfWidgetFormFilterInput(),
      'created_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'        => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'lastname'          => new sfValidatorPass(array('required' => false)),
      'firstname'         => new sfValidatorPass(array('required' => false)),
      'username'          => new sfValidatorPass(array('required' => false)),
      'password'          => new sfValidatorPass(array('required' => false)),
      'status_id'         => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'subscription_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'due_exempt'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'street'            => new sfValidatorPass(array('required' => false)),
      'zipcode'           => new sfValidatorPass(array('required' => false)),
      'city'              => new sfValidatorPass(array('required' => false)),
      'country'           => new sfValidatorPass(array('required' => false)),
      'picture'           => new sfValidatorPass(array('required' => false)),
      'email'             => new sfValidatorPass(array('required' => false)),
      'website'           => new sfValidatorPass(array('required' => false)),
      'phone_home'        => new sfValidatorPass(array('required' => false)),
      'phone_mobile'      => new sfValidatorPass(array('required' => false)),
      'state'             => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'association_id'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'updated_by'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'        => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('member_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Member';
  }

  public function getFields()
  {
    return array(
      'id'                => 'Number',
      'lastname'          => 'Text',
      'firstname'         => 'Text',
      'username'          => 'Text',
      'password'          => 'Text',
      'status_id'         => 'Number',
      'subscription_date' => 'Date',
      'due_exempt'        => 'Number',
      'street'            => 'Text',
      'zipcode'           => 'Text',
      'city'              => 'Text',
      'country'           => 'Text',
      'picture'           => 'Text',
      'email'             => 'Text',
      'website'           => 'Text',
      'phone_home'        => 'Text',
      'phone_mobile'      => 'Text',
      'state'             => 'Number',
      'association_id'    => 'Number',
      'created_by'        => 'Number',
      'updated_by'        => 'Number',
      'created_at'        => 'Date',
      'updated_at'        => 'Date',
    );
  }
}
