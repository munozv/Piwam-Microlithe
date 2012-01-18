<?php
/**
 * Status form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class StatusForm extends BaseStatusForm
{
  /**
   * Customizes the Status form. There is a lot of fields to unset in order
   * to re-create them from scratch with custom behaviour, especially the
   * hidden references (association, granted user id...)
   */
  public function configure()
  {
    $associationId  = sfContext::getInstance()->getUser()->getAttribute('association_id', null, 'user');
    $userId = sfContext::getInstance()->getUser()->getAttribute('user_id', null, 'user');

    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'], $this['updated_by']);
    unset($this['state'],      $this['association_id']);

    if ($this->getObject()->isNew())
    {
      $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
      $this->setDefault('created_by', $userId);
      $this->validatorSchema['created_by'] = new sfValidatorInteger();
    }
    else
    {
      $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['updated_by'] = new sfValidatorPass();
    }

    $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['state'] = new sfWidgetFormInputHidden();

    $this->validatorSchema['association_id'] = new sfValidatorInteger();
    $this->validatorSchema['state'] = new sfValidatorBoolean();

    $this->setDefault('association_id', $associationId);
    $this->setDefault('state', 1);

    $this->widgetSchema['label']->setAttribute('class', 'formInputLarge');
    $this->widgetSchema->setLabels(array('label' => 'Libellé du statut'));

    $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(array('model' => 'Status', 'column' => array('label', 'association_id')), array('invalid' => 'Ce statut existe déjà')));
  }
}
