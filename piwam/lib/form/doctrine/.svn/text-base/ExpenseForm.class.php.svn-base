<?php
/**
 * Expense form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ExpenseForm extends BaseExpenseForm
{
  /**
   * Customizes the Recette form. There is a lot of fields to unset in order
   * to re-create them from scratch with custom behaviour, especially the
   * hidden references (association, granted user id...)
   *
   * Required option :
   *    - myUser $user
   *
   * Optional option :
   *    - integer $associationId
   */
  public function configure()
  {
    if (! $user = $this->getOption('user'))
    {
      throw new InvalidArgumentException('You must provide a myUser object');
    }

    if (! $associationId = $this->getOption('associationId'))
    {
      $associationId = $user->getAssociationId();
    }

    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'], $this['updated_by']);
    unset($this['association_id']);

    if ($this->getObject()->isNew())
    {
      $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
      $this->setDefault('created_by', $user->getUserId());
      $this->setDefault('association_id', $associationId);
      $this->validatorSchema['association_id'] = new sfValidatorInteger();
      $this->validatorSchema['created_by'] = new sfValidatorInteger();
    }

    $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
    $this->setDefault('updated_by', $user->getUserId());
    $this->validatorSchema['updated_by'] = new sfValidatorInteger();
    $this->validatorSchema['state'] = new sfValidatorBoolean();
    $this->validatorSchema['amount'] = new sfValidatorAmount(array('min' => 0), array('min' => 'ne peut être négatif'));

    $this->widgetSchema['account_id']->setOption('query', AccountTable::getQueryEnabledForAssociation($associationId));
    $this->widgetSchema['activity_id']->setOption('query', ActivityTable::getQueryEnabledForAssociation($associationId));

    sfContext::getInstance()->getConfiguration()->loadHelpers("Asset");
    $this->widgetSchema['date'] = new sfWidgetFormJQueryDate(array(
      'image'   => image_path('calendar.gif'),
      'config'  => '{}',
      'culture' => 'fr_FR',
      'format'  => '%day%.%month%.%year%',
    ));

    $this->setDefault('date', date('y-m-d'));
    $this->setClasses();
    $this->setLabels();
  }

  /**
   * Set CSS styles for each field
   */
  protected function setClasses()
  {
    $this->widgetSchema['label']->setAttribute('class', 'formInputLarge');
    $this->widgetSchema['amount']->setAttribute('class', 'formInputShort');
    $this->widgetSchema['account_id']->setAttribute('class', 'formInputLarge');
    $this->widgetSchema['activity_id']->setAttribute('class', 'formInputLarge');
  }

  /**
   * Set labels for each field
   */
  protected function setLabels()
  {
    $this->widgetSchema->setLabels(array(
      'label'         => 'Libellé',
      'account_id'    => 'Compte affecté',
      'amount'        => 'Montant',
      'activity_id'   => 'Activité liée',
      'date'          => 'Date',
      'paid'          => 'Payée',
    ));
  }
}
