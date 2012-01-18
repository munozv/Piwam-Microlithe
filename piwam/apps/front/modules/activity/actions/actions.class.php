<?php
/**
 * Compare 2 Depense of Recette according to the date
 *
 * @param 	mixed	$entry1
 * @param 	mixed	$entry2
 * @return 	integer
 */
function compare_money_entries($entry1, $entry2)
{
  if ($entry1->getDate() <= $entry2->getDate())
  {
    return -1;
  }
  else
  {
    return 1;
  }
}

/**
 * activity actions.
 *
 * @package    piwam
 * @subpackage activity
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class activityActions extends sfActions
{
  /**
   * List existing Activities
   *
   * @param  sfWebRequest $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $associationId = $this->getUser()->getAssociationId();
    $this->activities = ActivityTable::getEnabledForAssociation($associationId);
  }

  /**
   * List the detailed Incomes and Expenses in a merged array.
   *
   * @param  sfWebRequest    $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $id              = $request->getParameter('id');
    $this->activity  = ActivityTable::getById($id);

    if ($this->activity->getAssociationId() == $this->getUser()->getAssociationId())
    {
      $this->forward404Unless($this->activity);
      $expenses      = $this->activity->getPaidExpenses()->getData();
      $incomes       = $this->activity->getReceivedIncomes()->getData();
      $this->records = array_merge($expenses, $incomes);
      $isSortOk      = usort($this->records, 'compare_money_entries');
      $this->iDebts  = IncomeTable::getAmountOfDebtsForActivity($id);
      $this->eDebts  = ExpenseTable::getAmountOfDebtsForActivity($id);
      $this->total   = $this->creances - $this->dettes;
    }
    else
    {
      $this->redirect('@error_credentials');
    }
  }

  /**
   * Display the form to create a new Activity and set the default values.
   *
   * @param 	sfWebRequest $request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new ActivityForm();
    $this->form->setDefault('created_by', $this->getUser()->getUserId());
    $this->form->setDefault('association_id', $this->getUser()->getAssociationId());
  }

  /**
   * Create the new Activity after performing operations. Form will be
   * displayed again if required.
   *
   * @param 	sfWebRequest	$request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new ActivityForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /**
   * Display a form to edit an existing Activite, if user has required
   * credentials
   *
   * @param  sfWebRequest $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($activity = ActivityTable::getById($id));

    if ($activity->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $this->form = new ActivityForm($activity);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Perform update of fields about an Activity
   *
   * @param 	sfWebRequest	$request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $this->forward404Unless($activity = ActivityTable::getById($id));
    $this->form = new ActivityForm($activity);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  /**
   * Delete existing Activite if user has enough Credentials
   *
   * @param  sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $this->forward404Unless($activity = ActivityTable::getById($id));

    if ($activity->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $activity->delete();
    $this->redirect('@activities_list');
  }

  /*
   * Process the different operations with data get from the form. Redirects
   * to main screen if everything is OK
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $activity = $form->save();
      $this->redirect('@activities_list');
    }
  }
}
