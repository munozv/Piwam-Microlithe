<?php
/**
 * statut actions.
 *
 * @package    piwam
 * @subpackage status
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class statusActions extends sfActions
{
  /**
   * Default action. Display the list of statut available for the current
   * association
   *
   * @param 	sfWebRequest 	$request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $id = $this->getUser()->getAssociationId();
    $this->status_list = StatusTable::getEnabledForAssociation($id);
  }

  /**
   * Show details about a particular Statut
   *
   * @param 	sfWebRequest	$request
   */
  public function executeShow(sfWebRequest $request)
  {
    $this->statut = StatusTable::getById($request->getParameter('id'));
    $this->forward404Unless($this->statut);

    if ($this->statut->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }
  }

  /**
   * Display a form to add a new Statut
   *
   * @param   sfWebRequest	$request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new StatusForm();
    $this->form->setDefault('created_by', $this->getUser()->getUserId());
  }

  /**
   * Display the creation form if an error occured or add the new
   * statut in the database
   *
   * @param   sfWebRequest 	$request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new StatusForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /**
   * Edit an existing Statut
   *
   * @param   sfWebRequest	$request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($status = StatusTable::getById($id));

    if ($status->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $this->form = new StatusForm($status);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Perform update of values
   *
   * @param 	sfWebRequest 	$request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $id = $request->getParameter('id');
    $this->forward404Unless($status = StatusTable::getById($id));
    $this->form = new StatusForm($status);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  /**
   * Delete a statut.
   *
   * @param   sfWebRequest 	$request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $this->forward404Unless($status = StatusTable::getById($id));

    if ($status->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $status->delete();
    $this->redirect('@status_list');
  }

  /**
   * If the form had been submit, we immediately set the statut
   * as enabled
   *
   * @param   sfWebRequest    $request
   * @param   sfForm          $form
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $status = $form->save();
      $status->setState(StatusTable::STATE_ENABLED);
      $status->save();
      $this->redirect('@status_list');
    }
  }
}
