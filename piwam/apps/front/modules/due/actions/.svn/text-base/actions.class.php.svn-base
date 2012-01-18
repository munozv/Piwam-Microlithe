<?php
/**
 * cotisation actions.
 *
 * @package    piwam
 * @subpackage due
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class dueActions extends sfActions
{
  /**
   * Displays the list of recorded Dues
   *
   * r20 : provides to the view the number of dues types that
   * 		   have been set
   *
   * @param 	sfWebRequest	$request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $id = $this->getUser()->getAssociationId();
    $page = $request->getParameter('page', 1);
    $this->duesPager = DueTable::getPagerEnabledForAssociation($id, $page);
    $this->typesExist = DueTypeTable::countForAssociation($id);
  }

  /**
   * Show details about a particular Due
   *
   * @param   sfWebRequest $request
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->due = DueTable::getById($request->getParameter('id'));
    $this->forward404Unless($this->due);

    if ($this->due->getDueType()->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }
  }

  /**
   * Display the form to register a new Due
   *
   * @param 	sfWebRequest	$request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DueForm();
    $this->form->setDefault('created_by', $this->getUser()->getUserId());
    $this->form->setDefault('association_id', $this->getUser()->getAssociationId());
  }

  /**
   * Check the creation of a new Due.
   *
   * @param 	sfWebRequest	$request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new DueForm();
    $this->form->setDefault('created_by', $this->getUser()->getUserId());
    $this->form->setDefault('association_id', $this->getUser()->getAssociationId());
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /**
   * Edit an existing Due after checking that user has required
   * credentials
   *
   * @param   sfWebRequest $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($due = DueTable::getById($id));

    if ($due->getDueType()->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $this->form = new DueForm($due);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Update a Due entry with new values
   *
   * @param 	sfWebRequest	$request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $id = $request->getParameter('id');
    $this->forward404Unless($due = DueTable::getById($id));
    $this->form = new DueForm($due);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  /**
   * Delete a Due
   *
   * @param   sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $this->forward404Unless($due = DueTable::getById($id));

    if ($due->getDueType()->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $due->delete();
    $this->redirect('@dues_list');
  }

  /*
   * Redirect again to the form if we are registering new Due (in order
   * to record several Due in "one time" without going back and then
   * coming back to the form.
   *
   * Redirect to index action if we are editing an existing Due
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $due = $form->save();
      $this->getUser()->setFlash('notice', 'Cotisation enregistrée avec succès.');
      $data = $request->getParameter('due');

      if (isset($data['id']))
      {
        $this->redirect('@dues_list');
      }
      else
      {
        $this->redirect('@due_new');
      }
    }
  }
}