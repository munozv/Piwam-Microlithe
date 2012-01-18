<?php

/**
 * DueType form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class DueTypeForm extends BaseDueTypeForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'],  $this['updated_by']);
    unset($this['state'],       $this['association_id']);

    if ($this->getObject()->isNew())
    {
      $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['association_id'] = new sfValidatorInteger();
      $this->validatorSchema['created_by'] = new sfValidatorInteger();
    }
    else
    {
      $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['updated_by'] = new sfValidatorInteger();
    }

    $this->widgetSchema['state'] = new sfWidgetFormInputHidden();
    $this->setDefault('state', 1);
    $this->validatorSchema['state'] = new sfValidatorBoolean();

    $this->setDefault('valide', 12);
    $this->widgetSchema['amount']->setAttribute('class', 'formInputShort');
    $this->widgetSchema['period']->setAttribute('class', 'formInputShort');
    $this->widgetSchema['label']->setAttribute('class', 'formInputLarge');

    // We do not allow negative values
    $this->validatorSchema['amount'] = new sfValidatorNumber(array('min' => 0), array('min' => 'ne peut être négatif'));
    $this->validatorSchema['period'] = new sfValidatorInteger(array('min' => 0), array('min' => 'ne peut être négatif'));

    $this->setLabels();
  }

  /**
   * Set labels for each widgets
   */
  protected function setLabels()
  {
    $this->widgetSchema->setLabels(array(
            'amount'  => 'Montant',
            'period'  => 'Valide',
            'label'   => 'Libellé',
    ));
  }
}
