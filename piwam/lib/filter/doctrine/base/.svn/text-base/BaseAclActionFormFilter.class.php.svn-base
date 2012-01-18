<?php

/**
 * AclAction filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseAclActionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'acl_module_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AclModule'), 'add_empty' => true)),
      'label'         => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'code'          => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'acl_module_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AclModule'), 'column' => 'id')),
      'label'         => new sfValidatorPass(array('required' => false)),
      'code'          => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('acl_action_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AclAction';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'acl_module_id' => 'ForeignKey',
      'label'         => 'Text',
      'code'          => 'Text',
    );
  }
}
