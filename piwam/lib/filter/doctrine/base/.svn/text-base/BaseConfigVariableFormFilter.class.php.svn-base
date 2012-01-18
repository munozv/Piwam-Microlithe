<?php

/**
 * ConfigVariable filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseConfigVariableFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'code'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'category_code' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('ConfigCategory'), 'add_empty' => true)),
      'label'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'description'   => new sfWidgetFormFilterInput(),
      'type'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'default_value' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'code'          => new sfValidatorPass(array('required' => false)),
      'category_code' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('ConfigCategory'), 'column' => 'code')),
      'label'         => new sfValidatorPass(array('required' => false)),
      'description'   => new sfValidatorPass(array('required' => false)),
      'type'          => new sfValidatorPass(array('required' => false)),
      'default_value' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('config_variable_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigVariable';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'code'          => 'Text',
      'category_code' => 'ForeignKey',
      'label'         => 'Text',
      'description'   => 'Text',
      'type'          => 'Text',
      'default_value' => 'Text',
    );
  }
}
