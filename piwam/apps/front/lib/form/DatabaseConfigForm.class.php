<?php
/**
 * This forms allows to configure MySQL accesss.
 *
 * @author Adrien Mogenet
 */
class DatabaseConfigForm extends BaseForm
{
    /**
     * Set the different widgets and validators
     */
    public function configure()
    {
        $this->setWidgets(array(
            'mysql_server'      => new sfWidgetFormInputText(),
            'mysql_username'    => new sfWidgetFormInputText(),
            'mysql_password'    => new sfWidgetFormInputPassword(),
            'mysql_dbname'      => new sfWidgetFormInputText(),
        ));

        $this->setValidators(array(
        	'mysql_server'		=> new sfValidatorString(array('required' => true)),
        	'mysql_username'	=> new sfValidatorString(array('required' => true)),
        	'mysql_dbname'		=> new sfValidatorString(array('required' => true)),
        	'mysql_password'	=> new sfValidatorString(array('required' => false)),
        ));

        $this->widgetSchema->setNameFormat('dbconfig[%s]');
        $this->_setClasses();
        $this->_setDefaults();
    }

    /*
     * Set the CSS classes to display input properly
     *
     */
    private function _setClasses()
    {
        $this->widgetSchema['mysql_server']->setAttribute('class', 'formInputNormal');
        $this->widgetSchema['mysql_username']->setAttribute('class', 'formInputNormal');
        $this->widgetSchema['mysql_password']->setAttribute('class', 'formInputNormal');
        $this->widgetSchema['mysql_dbname']->setAttribute('class', 'formInputNormal');
    }

    /*
     * Set the default values
     */
    private function _setDefaults()
    {
        $this->setDefault('mysql_server', 	'localhost');
        $this->setDefault('mysql_username', 'root');
        $this->setDefault('mysql_dbname', 	'piwam');
    }
}
?>