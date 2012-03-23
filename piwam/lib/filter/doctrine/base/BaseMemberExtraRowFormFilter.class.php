<?php

/**
 * MemberExtraRow filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseMemberExtraRowFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'association_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Association'), 'add_empty' => true)),
      'label'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'    => new sfWidgetFormFilterInput(),
      'type'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'default_value'  => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'slug'           => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'parameters'     => new sfWidgetFormFilterInput(),
      'required'       => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
    ));

    $this->setValidators(array(
      'association_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Association'), 'column' => 'id')),
      'label'          => new sfValidatorPass(array('required' => false)),
      'description'    => new sfValidatorPass(array('required' => false)),
      'type'           => new sfValidatorPass(array('required' => false)),
      'default_value'  => new sfValidatorPass(array('required' => false)),
      'slug'           => new sfValidatorPass(array('required' => false)),
      'parameters'     => new sfValidatorPass(array('required' => false)),
      'required'       => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
    ));

    $this->widgetSchema->setNameFormat('member_extra_row_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'MemberExtraRow';
  }

  public function getFields()
  {
    return array(
      'id'             => 'Number',
      'association_id' => 'ForeignKey',
      'label'          => 'Text',
      'description'    => 'Text',
      'type'           => 'Text',
      'default_value'  => 'Text',
      'slug'           => 'Text',
      'parameters'     => 'Text',
      'required'       => 'Boolean',
    );
  }
}
