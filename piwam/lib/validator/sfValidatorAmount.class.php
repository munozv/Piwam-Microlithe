<?php

/**
 * sfValidatorAmount validates an amount with decimal separator
 *
 * @package    symfony
 * @subpackage validator
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: sfValidatorNumber.class.php 11476 2008-09-12 12:48:38Z fabien $
 */
class sfValidatorAmount extends sfValidatorBase
{
    /**
     * Configures the current validator.
     *
     * Available options:
     *
     *  * max: The maximum value allowed
     *  * min: The minimum value allowed
     *
     * Available error codes:
     *
     *  * max
     *  * min
     *
     * @param array $options   An array of options
     * @param array $messages  An array of error messages
     *
     * @see sfValidatorBase
     */
    protected function configure($options = array(), $messages = array())
    {
        $this->addMessage('max', '"doit être supérieur à %max%.');
        $this->addMessage('min', '"ne peut être inférieur à %min%.');

        $this->addOption('min');
        $this->addOption('max');

        $this->setMessage('invalid', 'montant invalide');
    }

    /**
     * @see sfValidatorBase
     */
    protected function doClean($value)
    {
        $value = str_replace(',', '.', $value);

        if (!is_numeric($value))
        {
            throw new sfValidatorError($this, 'invalid', array('value' => $value));
        }

        $clean = floatval($value);

        if ($this->hasOption('max') && $clean > $this->getOption('max'))
        {
            throw new sfValidatorError($this, 'max', array('value' => $value, 'max' => $this->getOption('max')));
        }

        if ($this->hasOption('min') && $clean < $this->getOption('min'))
        {
            throw new sfValidatorError($this, 'min', array('value' => $value, 'min' => $this->getOption('min')));
        }

        return $clean;
    }
}
