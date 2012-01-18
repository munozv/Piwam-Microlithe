<?php

/**
 * Account form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AccountForm extends BaseAccountForm
{
  /**
   * Customizes the account form. There is a lot of fields to unset in order
   * to re-create them from scratch with custom behaviour, especially the
   * hidden references (association, granted user id...)
   */
  public function configure()
  {
    $associationId = $this->getOption('associationId');

    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'], $this['updated_by']);
    unset($this['state'], $this['association_id']);

    if ($this->getObject()->isNew())
    {
      $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['created_by'] = new sfValidatorInteger();
      $this->widgetSchema['state'] = new sfWidgetFormInputHidden();
      $this->setDefault('state', StatusTable::STATE_ENABLED);
      $this->validatorSchema['state'] = new sfValidatorBoolean();
    }
    else
    {
      $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['updated_by'] = new sfValidatorInteger();
    }

    $this->setClasses();
    $this->setLabels();
    $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['association_id'] = new sfValidatorInteger();
    $this->setDefault('association_id', $associationId);

    /*
     * Post validators, checking uniqueness
     */
    $referenceValidator = new sfValidatorDoctrineUnique(array('model' => 'Account', 'column' => array('reference', 'association_id')),
                                                        array('invalid' => 'Cette référence existe déjà'));
    $labelValidator     = new sfValidatorDoctrineUnique(array('model' => 'Account', 'column' => array('label', 'association_id')),
                                                        array('invalid' => 'Ce libellé existe déjà'));

    $this->validatorSchema->setPostValidator($referenceValidator);
    $this->mergePostValidator($labelValidator);
  }

  /**
   * Set classes of each widget
   */
  protected  function setClasses()
  {
    $this->widgetSchema['label']->setAttribute('class', 'formInputLarge');
    $this->widgetSchema['reference']->setAttribute('class', 'formInputNormal');
  }

  /**
   * Set the label of the different fields
   */
  protected function setLabels()
  {
    $this->widgetSchema->setLabels(array(
            'label'     => 'Libellé',
            'reference' => 'Référence',
    ));
  }
}
