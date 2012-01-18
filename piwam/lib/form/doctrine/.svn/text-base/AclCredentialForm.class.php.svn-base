<?php
/**
 * AclCredential form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AclCredentialForm extends BaseAclCredentialForm
{
  protected $_user_id;
  protected $_modules = array();

  /**
   * Get the name of module linked to the ID in parameter,
   * according to the stored array which is build in configure()
   * method
   *
   * @param   integer $id
   * @return  string
   */
  public function getModuleName($id)
  {
    return $this->_modules[$id];
  }

  /**
   * Set UserID
   *
   * @param   integer $user_id
   */
  public function setUserId($user_id)
  {
    $this->widgetSchema['user_id'] = new sfWidgetFormInputHidden();
    $this->setDefault('user_id', $user_id);
    $this->_user_id = $user_id;
  }

  /**
   * Build the form after retrieving the list of modules and actions
   * The array _modules is also filled
   */
  public function configure()
  {
    $this->widgetSchema['rights']       = new sfWidgetFormSchema();
    $this->validatorSchema              = new sfValidatorSchema();
    $this->validatorSchema['user_id']   = new sfValidatorInteger();
    $this->validatorSchema['rights']    = new sfValidatorPass();
    $modules = AclModuleTable::getAll();

    foreach ($modules as $module)
    {
      $this->widgetSchema['rights'][$module->getId()] = new sfWidgetFormSchema();
      $this->_modules[$module->getId()] = $module->getLabel();
      $actions = $module->getAclAction();

      foreach ($actions as $action)
      {
        $this->widgetSchema['rights'][$module->getId()][$action->getCode()] = new sfWidgetFormInputCheckbox();
        $this->widgetSchema['rights'][$module->getId()]->setLabel($action->getCode(), $action->getLabel());
      }
    }

    $this->widgetSchema->setNameFormat('rights[%s]');
  }

  /*
   * Check the checkboxes automatically if we are editing existing
   * rights
   */
  public function automaticCheck()
  {
    $member = MemberTable::getById($this->_user_id);
    $credentials = $member->getAclCredential();

    foreach ($credentials as $credential)
    {
      $this->widgetSchema['rights'][$credential->getModuleId()][$credential->getCode()]->setAttribute('checked', 'checked');
    }
  }
}
