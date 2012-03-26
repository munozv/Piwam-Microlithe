<?php

/**
 * listAct actions.
 *
 * @package    piwam
 * @subpackage listAct
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class listActActions extends sfActions
{
 /**
  * Executes index action
  *
  * @param sfRequest $request A request object
  */

  public function executeIndex(sfWebRequest $request)
  {

  }

  public function executeEdit(sfWebRequest $request)
  {
    $id = $request->getParameter('id');
    $this->id = 1;
  }

}
