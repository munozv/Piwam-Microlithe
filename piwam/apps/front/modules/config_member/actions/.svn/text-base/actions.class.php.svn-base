<?php
/**
 * config_member actions.
 *
 * @package    piwam
 * @subpackage config_member
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class config_memberActions extends sfActions
{
  /**
   * Main screen to customize extra rows. Process form if it has been
   * submit.
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $associationId = $this->getUser()->getAssociationId();
    $this->form = new MemberExtraRowForm();
    $this->form->setDefault('association_id', $this->getUser()->getAssociationId());

    if ($request->isMethod('post'))
    {
      $this->_processForm($request, $this->form);
    }

    $this->extraRows = MemberExtraRowTable::getForAssociation($associationId);
  }

  /**
   * Edit an existing row definition
   *
   * @param sfWebRequest $request
   */
  public function executeEdit(sfWebRequest $request)
  {
    $extraRow = MemberExtraRowTable::getById($request->getParameter('id'));
    $this->forward404Unless($extraRow);

    $this->form = new MemberExtraRowForm($extraRow);

    if ($request->isMethod('post'))
    {
      $this->_processForm($request, $this->form);
    }
  }

  /*
   * Process form values. Concatenate selected type of the new field and
   * the related parameters if required
   *
   * @param MemberExtraRowForm $form
  */
  private function _processForm(sfWebRequest $request, MemberExtraRowForm $form)
  {
    $form->bind($request->getParameter($form->getName()));

    if ($form->isValid())
    {
      $row = $form->save();
      $this->getUser()->setFlash('notice', 'Champ ajouté avec succès.');
      $this->redirect('@config_members');
    }
  }
}
