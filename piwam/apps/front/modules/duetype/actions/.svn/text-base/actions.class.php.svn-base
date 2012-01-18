<?php
/**
 * Due type actions.
 *
 * @package    piwam
 * @subpackage duetype
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class duetypeActions extends sfActions
{
  /**
   * Called by AJAX updater when creation a new Due.
   *
   * @param   sfWebRequest  $request
   */
  public function executeAjaxgetamountfor(sfWebRequest $request)
  {
    $id = $request->getParameter('id', false);

    if (! $id)
    {
      return $this->renderText(json_encode('Pas de montant'));
    }
    else
    {
      return $this->renderText(json_encode(DueTypeTable::getAmountForType($id)));
    }

    return $this->renderText(json_encode(null));
  }

  /**
   * List existing DueType
   *
   * @param   sfWebRequest $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $id = $this->getUser()->getAssociationId();
    $this->due_types = DueTypeTable::getEnabledForAssociation($id);
  }


  /**
   * r20 : If `first` attribute has been set, we want
   * 		   to create our first type. We will set a default
   * 		   value in label field
   *
   * @param 	sfWebRequest	$request
   * @see		  modules/cotisation/templates/indexSuccess.php
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->form = new DueTypeForm();
    $this->form->setDefault('created_by', $this->getUser()->getUserId());
    $this->form->setDefault('association_id', $this->getUser()->getAssociationId());

    if ($request->getParameter('first', false))
    {
      $this->form->setDefault('label', 'Cotisation annuelle ' . date('Y'));
    }
  }

  /**
   * Perform the creation of a new entry
   *
   * @param   sfWebRequest    $request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new DueTypeForm();
    $this->processForm($request, $this->form);
    $this->setTemplate('new');
  }

  /**
   * Edit an existing DueType
   *
   * @param  sfWebRequest $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->forward404Unless($due_type = DueTypeTable::getById($id));

    if ($due_type->getAssociationId() !== $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $this->form = new DueTypeForm($due_type);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Perform the update if no error occured
   *
   * @param  sfWebRequest    $request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $id = $request->getParameter('id');
    $this->forward404Unless($due_type = DueTypeTable::getById($id));
    $this->form = new DueTypeForm($due_type);
    $this->processForm($request, $this->form);
    $this->setTemplate('edit');
  }

  /**
   * Delete a CotisationType if user has required credentials
   *
   * @param sfWebRequest $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $this->forward404Unless($due_type = DueTypeTable::getById($id));

    if ($due_type->getAssociationId() != $this->getUser()->getAssociationId())
    {
      $this->redirect('@error_credentials');
    }

    $due_type->delete();
    $this->redirect('@duetypes_list');
  }

  /*
   * Process the different value from the form. Redirect to list if
   * everything is OK
   */
  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $due_type = $form->save();
      $this->redirect('@duetypes_list');
    }
  }
}
