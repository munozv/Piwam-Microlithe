<?php

/**
 * AclCredential filter form base class.
 *
 * @package    piwam
 * @subpackage filter
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseAclCredentialFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'member_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'acl_action_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AclAction'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'member_id'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Member'), 'column' => 'id')),
      'acl_action_id' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('AclAction'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('acl_credential_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AclCredential';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'member_id'     => 'ForeignKey',
      'acl_action_id' => 'ForeignKey',
    );
  }
}
