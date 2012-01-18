<?php

/**
 * AclCredential form base class.
 *
 * @method AclCredential getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24051 2009-11-16 21:08:08Z Kris.Wallsmith $
 */
abstract class BaseAclCredentialForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'member_id'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'add_empty' => true)),
      'acl_action_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AclAction'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'member_id'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Member'), 'required' => false)),
      'acl_action_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AclAction'), 'required' => false)),
    ));

    $this->widgetSchema->setNameFormat('acl_credential[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AclCredential';
  }

}
