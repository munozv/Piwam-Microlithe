<?php
/**
 * association actions.
 *
 * @package    piwam
 * @subpackage association
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12474 2008-10-31 10:41:27Z fabien $
 */
class associationActions extends sfActions
{
  /*
   * Make some operations easier
   *
   * @var Association
   */
  private $_association = null;

  /**
   * Display config form to edit Association's configuration
   *
   * @param   sfWebRequest    $request
   * @since   r75
   */
  public function executeConfig(sfWebRequest $request)
  {
    if ($request->isMethod('post'))
    {
      $data = $request->getParameter('config');

      foreach ($data as $key => $value)
      {
        Configurator::set($key, $value, $this->getUser()->getAssociationId());
      }
      $this->getUser()->setFlash('notice', 'Les préférences ont bien été prises en compte.', false);
    }

    $this->form = new ConfigForm();
  }

  /**
   * Display the current overview of the association, for each Compte and
   * each Activite.
   * We provide the lists of the Compte and Activite to the view.
   *
   * @param 	sfWebRequest	$request
   * @since	r9
   */
  public function executeBilan(sfWebRequest $request)
  {
    $associationId         = $this->getUser()->getAssociationId();
    $this->accounts        = AccountTable::getEnabledForAssociation($associationId);
    $this->activities      = ActivityTable::getEnabledForAssociation($associationId);
    $this->totalDues       = DueTable::getSumForAssociation($associationId);
    $this->totalUnpaid     = ExpenseTable::getAmountOfDebtsForAssociation($associationId);
    $this->totalUnreceived = IncomeTable::getAmountOfDebtsForAssociation($associationId);
    $this->totalDebts      = $this->totalUnreceived - $this->totalUnpaid;
  }

  /**
   * We don't have any way to list the associations
   *
   * @param   sfWebRequest    $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->associationsPager = AssociationTable::doSelectAssociations($request->getParameter('page', 1));
  }

  /**
   * Display creation form to register a new Assocation
   *
   * @param   sfWebRequest    $request
   */
  public function executeNew(sfWebRequest $request)
  {
    $this->getUser()->removeTemporaryData();
    $this->form = new AssociationForm();
    $this->setLayout('no_menu');
  }

  /**
   * Perform the creation of the new Association
   *
   * @param   sfWebRequest    $request
   */
  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post'));
    $this->form = new AssociationForm();
    if ($this->processForm($request, $this->form))
    {
      $this->_association->initialize();
      $this->getUser()->setTemporaryAssociationId($this->_association->getId());
      $this->redirect('@register_first_member');
    }
    else
    {
      $this->setTemplate('new');
    }
    $this->setLayout('no_menu');
  }

  /**
   * Display form to edit Association's information
   *
   * @param   sfWebRequest    $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $association = AssociationTable::getById($id);
    $this->forward404Unless($association, "L'association {$id} n'existe pas.");
    $this->form = new AssociationForm($association);
    $this->form->setDefault('updated_by', $this->getUser()->getUserId());
  }

  /**
   * Perform update of fields. Name of the association is also updated for the
   * session of the current user
   *
   * @param   sfWebRequest    $request
   */
  public function executeUpdate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod('post') || $request->isMethod('put'));
    $id = $request->getParameter('id');
    $association = AssociationTable::getById($id);
    $this->forward404Unless($association, "L'association {$id} n'existe pas.");
    $this->form = new AssociationForm($association);

    if ($this->processForm($request, $this->form, true))
    {
      $this->getUser()->setAttribute('association_name', $association->getName(), 'user');
      $this->redirect('@homepage');
    }
    else
    {
      $this->setTemplate('edit');
    }
  }

  /**
   * Perform the deletion
   *
   * @param   sfWebRequest    $request
   */
  public function executeDelete(sfWebRequest $request)
  {
    $request->checkCSRFProtection();
    $id = $request->getParameter('id');
    $association = AssociationTable::getById($id);
    $this->forward404Unless($association, "L'association {$id} n'existe pas.");
    $association->delete();
    $this->redirect('@associations_list');
  }

  /*
   * Process data sent from the form
   */
  protected function processForm(sfWebRequest $request, AssociationForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    if ($form->isValid())
    {
      $this->_association = $form->save();
      $params = $request->getParameter('association');

      if (isset($params['ping_piwam']) && $params['ping_piwam'] == 1)
      {
        $this->getUser()->setAttribute('ping_piwam', '1', 'temp');
      }

      return true;
    }
    return false;
  }
}
