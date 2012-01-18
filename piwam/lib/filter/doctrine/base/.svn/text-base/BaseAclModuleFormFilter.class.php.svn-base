<?php

/**
 * AclModule filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseAclModuleFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'label' => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'label' => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('acl_module_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AclModule';
  }

  public function getFields()
  {
    return array(
      'id'    => 'Number',
      'label' => 'Text',
    );
  }
}
