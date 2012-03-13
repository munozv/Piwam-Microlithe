<?php

/**
 * KsWCEvent form base class.
 *
 * @method KsWCEvent getObject() Returns the current form's model object
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseKsWCEventForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'               => new sfWidgetFormInputHidden(),
      'subject'          => new sfWidgetFormInputText(),
      'description'      => new sfWidgetFormTextarea(),
      'start_time'       => new sfWidgetFormDateTime(),
      'end_time'         => new sfWidgetFormDateTime(),
      'is_all_day_event' => new sfWidgetFormInputCheckbox(),
      'color'            => new sfWidgetFormInputText(),
      'recurring_rule'   => new sfWidgetFormInputText(),
      'people'           => new sfWidgetFormTextarea(),
      'price'            => new sfWidgetFormInputText(),
      'nbPlaceLeft'      => new sfWidgetFormInputText(),
      'nbTotalPlace'     => new sfWidgetFormInputText(),
      'activitePayee'    => new sfWidgetFormInputCheckbox(),
    ));

    $this->setValidators(array(
      'id'               => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'subject'          => new sfValidatorPass(array('required' => false)),
      'description'      => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'start_time'       => new sfValidatorDateTime(array('required' => false)),
      'end_time'         => new sfValidatorDateTime(array('required' => false)),
      'is_all_day_event' => new sfValidatorBoolean(array('required' => false)),
      'color'            => new sfValidatorPass(array('required' => false)),
      'recurring_rule'   => new sfValidatorPass(array('required' => false)),
      'people'           => new sfValidatorString(array('max_length' => 4000, 'required' => false)),
      'price'            => new sfValidatorPass(array('required' => false)),
      'nbPlaceLeft'      => new sfValidatorPass(array('required' => false)),
      'nbTotalPlace'     => new sfValidatorPass(array('required' => false)),
      'activitePayee'    => new sfValidatorBoolean(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('ks_wc_event[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'KsWCEvent';
  }

}
