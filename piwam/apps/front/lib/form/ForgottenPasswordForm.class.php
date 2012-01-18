<?php
/**
 * Allows a user to retrieve a forgotten password
 *
 * @since   r154
 * @author  adrien
 */
class ForgottenPasswordForm extends BaseForm
{
    public function configure()
    {
        $this->setWidgets(array(
          'username' => new sfWidgetFormInputText(),
        ));

        $this->widgetSchema->setNameFormat('password[%s]');

        $this->setValidators(array(
          'username' => new sfValidatorString(array('required' => true)),
        ));
    }
}
?>