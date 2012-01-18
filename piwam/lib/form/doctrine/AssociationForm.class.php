<?php
/**
 * Association form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class AssociationForm extends BaseAssociationForm
{
  public function configure()
  {
    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'], $this['updated_by']);
    unset($this['state'], $this['association_id']);
    unset($this['description']);

    if (! $this->getObject()->isNew())
    {
      $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
      $this->setDefault('updated_by', sfContext::getInstance()->getUser()->getUserId());
      $this->validatorSchema['updated_by'] = new sfValidatorInteger(array('required' => false));
    }
    else
    {
      $this->widgetSchema['ping_piwam'] = new sfWidgetFormInputCheckbox();
      $this->setDefault('ping_piwam', true);
      $this->validatorSchema['ping_piwam'] = new sfValidatorBoolean();
    }

    $this->widgetSchema['description'] = new sfWidgetFormTextarea();
    $this->validatorSchema['description'] = new sfValidatorString(array('required' => false));
    $this->validatorSchema['website'] = new sfValidatorUrl(array('required' => false));

    $this->setLabels();
    $this->setClasses();
  }

  /*
   * Set displayed field names
   */
  protected function setLabels()
  {
    $this->widgetSchema->setLabels(array(
            'website'     => 'Site web',
            'name'        => 'Nom de l\'association',
            'description' => 'Description',
            'ping_piwam'  => 'Notification'
    ));
  }

  /*
   * Set CSS styles
   *
   */
  protected function setClasses()
  {
    $this->widgetSchema['name']->setAttribute('class', 'formInputLarge');
    $this->widgetSchema['description']->setAttribute('class', 'formInputLarge');
    $this->widgetSchema['website']->setAttribute('class', 'formInputLarge');
  }
}
