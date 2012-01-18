<?php
/**
 * Represents the form which allows us to mail Membre of our Association
 *
 * @author 	Adrien Mogenet
 * @since	r10
 */
class MailingForm extends BaseForm
{
  /**
   * Set the widgets and validators for the Mailing form
   */
  public function configure()
  {
    $this->setWidgets(array(
      'subject'       => new sfWidgetFormInputText(),
      'mail_content' 	=> new sfWidgetFormTextareaTinyMCE(array(
        'width'       => 550,
        'height'      => 350,
        'config'      => '	theme_advanced_buttons1 : "bold,italic,underline,fontsizeselect,fontselect,forecolorpicker,image,link,justifyleft,justifycenter,justifyright,justifyfull,bullist,numlist,indent,outdent",
                            theme_advanced_buttons2 : "",
                            theme_advanced_buttons3 : "",
                            theme_advanced_statusbar_location : "none"'
        ),
      array('rows' => 40, 'cols' => 10)),
    ));

    $this->setValidators(array(
      'subject'       => new sfValidatorString(array('required' => true)),
      'mail_content'	=> new sfValidatorString(array('required' => true)),
    ));

    $this->widgetSchema->setLabels(array(
      'subject'       => 'Objet',
      'mail_content'  => 'Message',
    ));

    $this->widgetSchema->setNameFormat('mailing[%s]');
    $this->widgetSchema['subject']->setAttribute('class', 'formInputXtraLarge');
  }
}
?>