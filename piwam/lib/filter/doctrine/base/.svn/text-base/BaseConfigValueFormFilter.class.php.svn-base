<?php

/**
 * ConfigValue filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseConfigValueFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'custom_value'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'custom_value'       => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('config_value_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ConfigValue';
  }

  public function getFields()
  {
    return array(
      'config_variable_id' => 'Number',
      'association_id'     => 'Number',
      'custom_value'       => 'Text',
    );
  }
}
