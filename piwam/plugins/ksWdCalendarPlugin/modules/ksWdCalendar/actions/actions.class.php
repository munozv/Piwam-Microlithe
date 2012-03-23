<?php

/**
 * sfCalendar actions.
 *
 * @package    ksWdCalendarPlugin
 * @subpackage sfCalendar
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class ksWdCalendarActions extends sfActions
{
  public function preExecute(){
    parent::preExecute() ;
    //var_dump(sfConfig::getAll());
    $culture = "us" ;
    $this->arrayCulture = sfConfig::get("sf_ks_wd_calendar_plugin") ;
    $this->arrayCulture = $this->arrayCulture['culture_us'];
    
    //die(var_export($this->arrayCulture , true));
  }

  public function executeIndex(sfWebRequest $request)
  {
    $this->ks_wc_events = Doctrine_Core::getTable('KsWCEvent')
      ->createQuery('a')
      ->execute();
  }

  /*  public function parseString(string $str)
  {
    $i = 0;
    $res = 0;
    while ($str[$i] != '\0')
      {
	if ($str[$i] == ';')
	  $res++;

      }
    $arr = array($res);
    $i = 0;
    $j = 0;
    while ($str[$i] != '\0')
      {
	if ($i == 0)

	$i++;
      }
  }
  */
  public function executeList(sfWebRequest $request){
    //die('{"events":[[73773,"go to dinner","11\/16\/2010 18:21","01\/01\/1970 03:18",1,1,0,6,1,"Moore",""],[24322,"project plan review","11\/15\/2010 22:40","01\/01\/1970 03:10",1,0,0,12,1,"Moore",""],[18984,"go to dinner","11\/18\/2010 11:57","01\/01\/1970 02:06",0,1,0,10,1,"Belion",""],[54235,"remote meeting","11\/20\/2010 02:58","01\/01\/1970 02:35",1,0,0,8,1,"Belion",""],[98751,"team meeting","11\/16\/2010 06:15","01\/01\/1970 02:58",1,0,0,10,1,"Newswer",""],[80951,"go to dinner","11\/17\/2010 04:19","01\/01\/1970 02:33",0,0,0,6,1,"Belion",""],[44390,"project plan review","11\/18\/2010 01:49","01\/01\/1970 02:35",0,0,0,12,1,"Lodan",""],[84519,"go to dinner","11\/18\/2010 21:16","01\/01\/1970 02:44",0,0,0,4,1,"Lodan",""],[98796,"remote meeting","11\/20\/2010 13:40","01\/01\/1970 03:10",1,0,0,3,1,"Moore",""],[12343,"team meeting","11\/15\/2010 19:38","01\/01\/1970 03:35",1,0,0,5,1,"Moore",""],[66461,"remote meeting","11\/16\/2010 06:59","01\/01\/1970 03:53",1,0,0,11,1,"Moore",""],[27891,"annual report","11\/17\/2010 02:15","01\/01\/1970 02:56",1,0,0,3,1,"Belion",""],[85772,"team meeting","11\/18\/2010 16:58","01\/01\/1970 02:41",1,0,0,5,1,"Newswer",""],[86508,"annual report","11\/19\/2010 16:00","01\/01\/1970 03:45",1,0,0,6,1,"Bytelin",""],[92041,"project plan review","11\/19\/2010 22:21","01\/01\/1970 02:57",0,0,0,9,1,"Moore",""],[66057,"remote meeting","11\/20\/2010 22:34","01\/01\/1970 02:31",0,1,0,1,1,"Moore",""],[73918,"annual report","11\/18\/2010 16:34","01\/01\/1970 03:29",0,0,0,-1,1,"Newswer",""],[71911,"team meeting","11\/21\/2010 10:53","01\/01\/1970 02:40",1,0,0,8,1,"Bytelin",""],[54304,"project plan review","11\/15\/2010 14:27","01\/01\/1970 02:25",0,0,0,1,1,"Belion",""],[87224,"remote meeting","11\/19\/2010 13:21","01\/01\/1970 02:12",0,0,0,7,1,"Bytelin",""]],"issort":true,"start":"11\/15\/2010 00:00","end":"11\/21\/2010 23:59","error":null}');

    $start_day = (string)$request->getParameter('showdate', '');
    $type      = (string)$request->getParameter('viewtype', 'month');

    // On initialise les valeurs de retour
    $this->events = array();
    $this->issort = true;
    $this->start  = null;
    $this->end    = null;
    $this->error  = null;

    try {
      //$php_time = ksWdCalendar::js2PhpTime($start_day, sfConfig::get('app_sf_calendar_pp_culture'));
      $php_time = ksWdCalendar::js2PhpTime($start_day, $this->arrayCulture['fulldaykey']);

      // On initialise les dates de début et de fin en fonction du type
      switch ($type) {
      case 'month':
	$start_time = mktime(0, 0, 0, date('m', $php_time), 1, date('Y', $php_time));

	$end_time   = mktime(0, 0, -1, date('m', $php_time)+1, 1, date('Y', $php_time));

	break;

      case 'week':
	//suppose first day of a week is monday
	$monday  =  date('d', $php_time) - date('N', $php_time) + 1;
	$start_time = mktime(0, 0, 0, date('m', $php_time), $monday, date('Y', $php_time));
	$end_time   = mktime(0, 0, -1, date('m', $php_time), $monday + 7, date('Y', $php_time));
	break;

      case 'day':
	$start_time = mktime(0, 0, 0, date('m', $php_time), date('d', $php_time), date('Y', $php_time));
	$end_time   = mktime(0, 0, -1, date('m', $php_time), date('d', $php_time) + 1, date('Y', $php_time));
	break;

      default:
	throw new sfException('Le type du calendrier demandé n\'est pas connu');
      }


      $this->start  = ksWdCalendar::php2JsTime($start_time , $this->arrayCulture['jsdate']);
      $this->end    = ksWdCalendar::php2JsTime($end_time , $this->arrayCulture['jsdate']);

      $start_time = date("Y-m-d H:i:s" , $start_time) ;
      $end_time = date("Y-m-d H:i:s" , $end_time) ;

      $q = Doctrine_Query::create()
        ->select('a.*')
        ->from('KsWCEvent a')
        //->where("(start_time >= \"$start_time\" AND start_time <= \"$end_time\") OR (end_time <= \"$end_time\" AND end_time >= \"$start_time\")")
        ->where("(start_time BETWEEN ? AND ?) OR (end_time BETWEEN ? AND ?)" , Array($start_time , $end_time , $start_time , $end_time ))
        ;



      foreach($q->execute() as $event){
        //die(ksWdCalendar::php2JsTime($event->getStartTime(null) , $this->arrayCulture['jsdate'])) ;
        $this->events[] = array(
				$event->getId(),
				$event->getSubject(),
				ksWdCalendar::php2JsTime($event->getStartTime(null) , $this->arrayCulture['jsdate']),
				ksWdCalendar::php2JsTime($event->getEndTime(null) , $this->arrayCulture['jsdate']),
				$event->getIsAllDayEvent(),
				0, // événement sur plus d'un jour
				$event->getRecurringRule(),
				$event->getColor(),
				1, // éditable
				'',
				);
      }
      //var_dump($this->events);die("a");

    } catch (Exception $e) {
      $this->error = $e->getMessage();
    }
  }

  public function executeShow(sfWebRequest $request)
  {
    $this->ks_wc_event = Doctrine_Core::getTable('KsWCEvent')->find(array($request->getParameter('id')));
    $this->forward404Unless($this->ks_wc_event);
  }

  public function executeNew(sfWebRequest $request)
  {
    $this->setLayout(false) ;
    $this->form = new KsWCEventForm();
  }

  public function executeCreate(sfWebRequest $request)
  {
    $this->forward404Unless($request->isMethod(sfRequest::POST));

    $this->form = new KsWCEventForm();

    $this->processForm($request, $this->form);

    $this->setTemplate('update');
  }

  public function executeEdit(sfWebRequest $request)
  {
    $this->setLayout(false) ;
    if( !($ks_wc_event = Doctrine_Core::getTable('KsWCEvent')->find(array($request->getParameter('id'))))){
      $ks_wc_event = new KsWCEvent() ;
      $ks_wc_event->setStartTime($request->getParameter('start')) ;
      $ks_wc_event->setEndTime($request->getParameter('end')) ;
      $ks_wc_event->setSubject($request->getParameter('title')) ;
      $ks_wc_event->setDescription($request->getParameter('description')) ;
      $ks_wc_event->setIsAllDayEvent($request->getParameter('isallday')) ;
    }
    //$this->forward404Unless($ks_wc_event = Doctrine_Core::getTable('KsWCEvent')->find(array($request->getParameter('id'))), sprintf('Object ks_wc_event does not exist (%s).', $request->getParameter('id')));
    $this->form = new KsWCEventForm($ks_wc_event);
    sfConfig::set('sf_web_debug', false) ;
    if($this->form->getObject()->isNew()){
      //$this->renderComponent("sfCalendar", "new") ;
      $this->setTemplate("new") ;
      return ;
    }
  }

  public function executeUpdate(sfWebRequest $request){
    $this->forward404Unless($request->isMethod(sfRequest::POST) || $request->isMethod(sfRequest::PUT));
    $this->forward404Unless($ks_wc_event = Doctrine_Core::getTable('KsWCEvent')->find(array($request->getParameter('id'))), sprintf('Object ks_wc_event does not exist (%s).', $request->getParameter('id')));
    $this->form = new KsWCEventForm($ks_wc_event);

    $this->processForm($request, $this->form);

    sfConfig::set('sf_web_debug', false) ;
    $this->setLayout(false);
    $this->setTemplate('update');
  

  }

  public function executeDelete(sfWebRequest $request)
  {
    //$request->checkCSRFProtection();

    $this->forward404Unless($ks_wc_event = Doctrine_Core::getTable('KsWCEvent')->find(array($request->getParameter('id'))), sprintf('Object ks_wc_event does not exist (%s).', $request->getParameter('id')));
    $ks_wc_event->delete();

    $this->success = true ;
    $this->message = "Event deleted" ;

    //$this->redirect('sfCalendar/index');
  }

  protected function processForm(sfWebRequest $request, sfForm $form)
  {
    $isNew = $form->getObject()->isNew() ;

    $arrayParams = $request->getParameter($form->getName()) ;
    if(!isset($arrayParams['subject'])){
      $arrayParams['subject'] = $form->getObject()->getSubject() ;
    }

    if(!isset($arrayParams['description'])){
      $arrayParams['description'] = $form->getObject()->getDescription() ;
    }

    $form->bind($arrayParams, $request->getFiles($form->getName()));
    
    if ($form->isValid())
      {
	//var_dump($form->getObject()->getSubject());var_dump($form->getObject()->getStartTime());var_dump($form->getObject()->getId());
	$ks_wc_event = $form->save();
	if (($form->getObject()->getPeople()) && ($member = MemberTable::getByUsername($form->getObject()->getPeople())) == NULL )
	  {
	    $ks_wc_event->delete();
	    $this->success = false ;
	    $this->message = $form->renderGlobalErrors() ;
	    //$this->message = "get people NULL";
	    $this->data = $form->getObject()->getId();
	  }
	else
	  {
	    //var_dump($ks_wc_event->getSubject());var_dump($ks_wc_event->getStartTime());var_dump($ks_wc_event->getId());exit();
	    //$this->redirect('sfCalendar/edit?id='.$ks_wc_event->getId());
	    $this->success = true ;
	    $this->message = (($isNew)?"Added Event":"Event updated") ;
	    $this->data = $form->getObject()->getId();
	  }
      }
    else 
      {
        $this->success = false ;
        $this->message = $form->renderGlobalErrors() ;
        $this->data = $form->getObject()->getId();
      }
  }
}

      //  if(isset($arrayParams['description']))
      //    {
      //      $member->setActivity($arrayParams['description']);
      //      $member->setActivity('lol');
      //      $member->save();
      //    }

	  //	  $member->setActivity($form->getObject()->getSubject());