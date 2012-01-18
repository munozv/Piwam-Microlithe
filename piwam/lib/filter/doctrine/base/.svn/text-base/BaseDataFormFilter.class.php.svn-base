<?php

/**
 * Data filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseDataFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'config_key' => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'value'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'config_key' => new sfValidatorPass(array('required' => false)),
      'value'      => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('data_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'Data';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'config_key' => 'Text',
      'value'      => 'Text',
    );
  }
}
