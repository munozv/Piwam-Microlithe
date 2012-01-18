<?php
/**
 * sfCustomUniqueValidator checks if a record exist in the database with all the
 * mentionned fields.
 * Based on a code found on Symfony website
 *
 * @package		lib
 * @author     	Joachim Martin, Adrien Mogenet
 * @see			http://snippets.symfony-project.org/snippet/195
 */

class sfValidatorCustomUnique extends sfValidatorBase
{
    /**
     * Set the options and messages we can custom
     *
     * @param 	array	$options
     * @param 	array	$messages
     */
    protected function configure($options = array(), $messages = array())
    {
        $this->addOption('class', 		null);
        $this->addOption('fields', 		array());
        $this->addMessage('exists', 	'Un enregistrement similaire existe déjà.');
    }

    /**
     * Executes this validator.
     *
     * @param 	mixed A file or parameter value/array
     * @param 	error An error message reference
     * @return 	mixed
     */
    protected function doClean($value) {

        $className  = $this->getOption('class') . 'Peer';
        $fields 	= $this->getOption('fields');
        $c 			= new Criteria();
        $object		= null;

        // We build the Criteria
        foreach ($fields as $field => $fieldValue)
        {
            $columnName = call_user_func(array($className, 'translateFieldName'), $field, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);

            /*
             * I think following line needs some explanations.
             * If no value has been set for the colum, that means
             * that we are processing the column which is linked to
             * this validator. So we take the current value (which has been
             * submit by the user through the form)
             */

            if (is_null($fieldValue)) {
                $fieldValue = $value;
            }

            $c->add($columnName, $fieldValue);
        }

        $c->setIgnoreCase(true);
        $object = call_user_func(array($className, 'doSelectOne'), $c);

        /*
         * If we found an object that corresponds to the current
         * value, we check if we are editing the row itself.
         * So we compare the PK.
         */
        if (!is_null($object))
        {
            $tableMap = call_user_func(array($className, 'getTableMap'));

            foreach ($tableMap->getColumns() as $column)
            {
                if (!$column->isPrimaryKey()) {
                    continue;
                }
                else
                {
                    $method = 'get' . $column->getPhpName();
                    $primaryKey = call_user_func(array($className, 'translateFieldName'), $column->getPhpName(), BasePeer::TYPE_PHPNAME, BasePeer::TYPE_FIELDNAME);
                    $currentPk 	= sfContext::getInstance()->getRequest()->getParameter($primaryKey);
                    $objectPk	= $object->$method();

                    if ($objectPk != $currentPk) {
                        throw new sfValidatorError($this, 'exists', array('value' => $value));
                    }
                }
            }
        }

        return $value;
    }
}
?>