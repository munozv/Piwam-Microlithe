<?php

/**
 * AclAction form base class.
 *
 * @method AclAction getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseAclActionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'acl_module_id' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('AclModule'), 'add_empty' => true)),
      'label'         => new sfWidgetFormInputText(),
      'code'          => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'acl_module_id' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('AclModule'), 'required' => false)),
      'label'         => new sfValidatorString(array('max_length' => 255)),
      'code'          => new sfValidatorString(array('max_length' => 100)),
    ));

    $this->widgetSchema->setNameFormat('acl_action[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'AclAction';
  }

}
