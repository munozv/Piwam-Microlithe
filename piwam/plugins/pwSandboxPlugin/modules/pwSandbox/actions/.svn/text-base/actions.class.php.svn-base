<?php
/**
 * New actions that our pwSandboxPlugin will offer.
 *
 * @package     pwSandboxPlugin
 * @subpackage  actions
 * @author      adrien
 * @since       1.2
 */
class pwSandboxActions extends sfActions
{
  /**
   * A method called `executeFoobar` declares a `foobar` action.
   * You can access to your action through URL `yourModule/foobar`
   * if no action is provided (e.g.: `yourModule`) the index action
   * will be called by default.
   *
   * Here, the 'index' action will list the existing debts for the
   * current association.
   *
   * @param sfWebRequest $request
   */
  public function executeIndex(sfWebRequest $request)
  {
    /*
     * Method ->getUser() returns a myUser instance, which represents
     * the session of the current user.
     * That myUser object can provide some useful information as
     * described in the documentation (User ID, username...)
     */
    $associationId = $this->getUser()->getAssociationId();

    /*
     * Now, we retrieve the list of existing debts thanks to the
     * method we implemented in DebtTable
     */
    $debts = DebtTable::getAllForAssociation($associationId);

    /*
     * And finally, we give the variable to the view to be able
     * to display them. Open `indexSuccess.php` to discover how
     * to use these variables.
     */
    $this->debts = $debts;
  }

  /**
   * The action `new` will display the form to add a new debt
   * for a member
   * 
   * @param sfWebRequest $request
   */
  public function executeNew(sfWebRequest $request)
  {
    /*
     * As in the `index` action, we retrieve the current user's
     * association ID
     */
    $associationId = $this->getUser()->getAssociationId();

    /*
     * And we give this id to the DebtForm we designed. The symfony
     * forms that manage Doctrine objects take 2 parameters :
     *
     *  - the current object to edit (here, this is a new object, so we give
     *    null object)
     * 
     *  - additional parameters that can be used into the form (here, we give
     *    the current myUser)
     *
     * See also :
     * ----------
     * http://www.symfony-project.org/api/1_4/sfForm#method___construct
     * 
     */
    $this->form = new DebtForm(null, array('user' => $this->getUser()));
  }

  /**
   * The action `create` will be called once the DebtForm will be
   * submitted.
   *
   * @param sfWebRequest $request
   */
  public function executeCreate(sfWebRequest $request)
  {
    /*
     * `forward404unless` is a symfony method to redirect to the 404
     * error page if the statement === false. Here, we check that
     * we reach this action through a POST request
     */
    $this->forward404Unless($request->isMethod('post'));

    /*
     * We need to re-instanciate the form, because we will bind the
     * submitted values. Now you know the meaning this line !
     */
    $this->form = new DebtForm(null, array('user' => $this->getUser()));

    /*
     * Then process step is done by our processForm method
     */
    $this->processForm($request, $this->form);

    /*
     * This line is reached only if processForm has failed (ie: an error
     * has occured). We want to use the same template as in the action `new`.
     */
    $this->setTemplate('new');
  }

  /**
   * Process the different operations with data get from the form.
   * Redirects to main screen if everything is OK.
   *
   * @param   sfWebRequest  $request
   * @param   DebtForm      $form
   */
  protected function processForm(sfWebRequest $request, DebtForm $form)
  {
    $form->bind($request->getParameter($form->getName()), $request->getFiles($form->getName()));

    /*
     * isValid() is a method that check that the form is valid or not
     * according to the validators we set in the $form
     */
    if ($form->isValid())
    {
      /*
       * If everithing is ok, we can save the new object. Here, Doctrine
       * and symfony act "automagically" to save the new Income (bind with
       * values in the embedded Income form) and the new Debt.
       *
       * The $debt variable is a Debt object, you can perform some custom
       * operations if you need.
       */
      $debt = $form->save();

      /*
       * And because everything went fine, we redirect the user
       * to the list of Debts.
       */
      $this->redirect('pwSandbox/index');
    }
  }
}
?>
