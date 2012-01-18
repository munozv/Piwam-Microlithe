<?php
/**
 * error actions.
 *
 * @package    piwam
 * @subpackage error
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class errorActions extends sfActions
{
  /**
   * Executes index action
   *
   * @param sfRequest $request A request object
   */
  public function executeIndex(sfWebRequest $request)
  {
    $this->forward('error', 'error404');
  }

  /**
   * Set 'error 404' view
   *
   * @param     sfWebRequest    $request
   * @since     r30
   */
  public function executeError404(sfWebRequest $request)
  {
    // do nothing : display template
  }

  /**
   * If we reach this actions, this is because we met a credential issue.
   *
   * @param   sfWebRequest    $request
   * @since   r49
   */
  public function executeCredentials(sfWebRequest $request)
  {
    // do nothing : display template
    return sfView::ERROR;
  }
}
