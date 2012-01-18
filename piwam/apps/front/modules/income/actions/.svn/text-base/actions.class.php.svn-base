<?php
/**
 * Income actions.
 *
 * @package    piwam
 * @subpackage income
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class incomeActions extends sfActions
{
  /**
   * Export the list of Depense within a file
   *
   * @param 	sfWebRequest	$request
   * @since   r39
   */
  public function executeExport(sfWebRequest $request)
  {
    sfContext::getInstance()->getConfiguration()->loadHelpers('Number');
    $csv = new FileExporter('liste-recettes.csv');
    $incomes = IncomeTable::getPagerForAssociation($this->getUser()->getAssociationId());

    echo $csv->addLineCSV(array(
			'Libellé',
			'Montant (euros)',
			'Compte',
			'Activité',
			'Date',
    ));

    foreach ($incomes as $income)
    {
      echo $csv->addLineCSV(array(
      $income->getLabel(),
      format_currency($income->getAmount()),
      $income->getAccount(),
      $income->getActivity(),
      $income->getDate(),
      ));
    }
    $csv->exportContentAsFile();
  }

  /**
   * List Recettes
   *
   * @param  sfWebRequest $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $association_id = $this->getUser()->getAssociationId();
    $page = $request->getParameter('page', 1);
    $this->incomesPager = IncomeTable::getPagerForAssociation($association_id, $page);
  }

  /**
   * Show details about a particular Recette
   *
   * @param  sfWebRequest $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->recette = IncomeTable::getById($request->getParameter('id'));

    if ($this->recette->getAssociationId() == $this->getUser()->getAssociationId())
    {
      $this->forward404Unless($this->recette);
    }
    else
    {
      $this->redirect('@error_credentials');
    }
  }

  /**
   * Display the form to record a new Recette
   *
   * @param  sfWebRequest $request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new IncomeForm(null, array('user' => $this->getUser()));
  }

  /**
   * Display form if error or record the new Recette
   *
   * @param  sfWebRequest $request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new IncomeForm(null, array('user' => $this->getUser()));
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /**
   * Display edit form
   *
   * @param   sfWebRequest    $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($income = IncomeTable::getById($id));

    if ($income->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $this->form = new IncomeForm($income, array('user' => $this->getUser()));
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Performs update
   *
   * @param   sfWebRequest    $request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $id = $request->getParameter('id');
    $this->forward404Unless($income = IncomeTable::getById($id));
    $this->form = new IncomeForm($income, array('user' => $this->getUser()));
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  /**
   * Delete an existing Recette. Check if user has required credentials
   *
   * @param sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $this->forward404Unless($income = IncomeTable::getById($id));

    if ($income->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $income->delete();
    $this->redirect('@incomes_list');
  }

  /**
   * Process values given by the $form
   *
   * @param   sfWebRequest    $request
   * @param   sfForm          $form
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $income = $form->save();
      $this->redirect('@incomes_list');
    }
  }
}
