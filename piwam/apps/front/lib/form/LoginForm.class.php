<?php
/**
 * Represents the login form
 *
 * @author 	Adrien Mogenet
 * @since	r7
 */
class LoginForm extends BaseForm
{
  /**
   * Configure form's widgets
   *
   * 1.2 : New OpenID field
   */
  public function configure()
  {
    $this->setWidgets(array(
      'username' => new sfWidgetFormInputText(),
      'password' => new sfWidgetFormInputPassword(),
      'openid'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'username' => new sfValidatorString(array('required' => true)),
      'password' => new sfValidatorString(array('required' => true)),
      'openid'   => new sfValidatorEmail(array('required' => false)),
    ));

    $this->widgetSchema->setLabels(array(
      'username'  => "Nom d'utilisateur",
      'password'  => 'Mot de passe',
      'openid'    => 'Open ID'
    ));

    $this->widgetSchema->setNameFormat('login[%s]');
  }
}
?>