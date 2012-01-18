<?php
/**
 * Account actions.
 *
 * @package    piwam
 * @subpackage account
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class accountActions extends sfActions
{
  /**
   * List existing Compte
   *
   * @param  sfWebRequest $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->accounts = AccountTable::getEnabledForAssociation($this->getUser()->getAssociationId());
  }

  /**
   * Show details about a particular Compte
   *
   * @param   sfWebRequest $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->account = AccountTable::getById($request->getParameter('id'));
    $this->forward404Unless($this->account);

    if ($this->account->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }
  }

  /**
   * Display a form to register a new account
   *
   * @param 	sfWebRequest	$request
   */
  public function executeNew(sfWebRequest $request)
  {
    $association_id = $this->getUser()->getAssociationId();
    $this->form = new AccountForm(null, array('associationId' => $association_id));
    $this->form->setDefault('created_by', $this->getUser()->getUserId());
  }

  /**
   * Perform the creation ; display the form again if an error occured
   *
   * @param 	sfWebRequest	$request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $account_array = $request->getParameter('account');
    $associationId = $account_array['association_id'];
    $this->form = new AccountForm(null, array('associationId' => $associationId));
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /**
   * Display the form to edit an existing account object
   *
   * @param 	sfWebRequest	$request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $account = AccountTable::getById($id);
    $this->forward404Unless($account, "Account {$id} does not exist.");

    if ($account->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $this->form = new AccountForm($account, array('associationId' => $account->getAssociationId()));
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Perform the update of information
   *
   * @param 	sfWebRequest	$request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $id = $request->getParameter('id');
    $account = AccountTable::getById($id);
    $this->forward404Unless($account, "Account {$id} does not exist.");
    $this->form = new AccountForm($account, array('associationId' => $account->getAssociationId()));
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  /**
   * Delete a Compte if user has enough credentials
   *
   * @param   sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $account = AccountTable::getById($id);
    $this->forward404Unless($account, "Account {$id} does not exist.");

    if ($account->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $account->delete();
    $this->redirect('@accounts_list');
  }

  /**
   * Process values got from the form. Redirects to the list of accounts
   * if everything went fine
   *
   * @param   sfWebRequest    $request
   * @param   sfForm          $form
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $account = $form->save();
      $this->redirect('@accounts_list');
    }
  }
}
