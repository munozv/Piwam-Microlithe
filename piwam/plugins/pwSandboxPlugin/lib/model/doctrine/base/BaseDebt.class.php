<?php

/**
 * BaseDebt
 * 
 * This class has been auto-generated by the Doctrine ORM Framework
 * 
 * @property integer $id
 * @property integer $member_id
 * @property integer $income_id
 * @property Member $Member
 * @property Income $Income
 * 
 * @method integer getId()        Returns the current record's "id" value
 * @method integer getMemberId()  Returns the current record's "member_id" value
 * @method integer getIncomeId()  Returns the current record's "income_id" value
 * @method Member  getMember()    Returns the current record's "Member" value
 * @method Income  getIncome()    Returns the current record's "Income" value
 * @method Debt    setId()        Sets the current record's "id" value
 * @method Debt    setMemberId()  Sets the current record's "member_id" value
 * @method Debt    setIncomeId()  Sets the current record's "income_id" value
 * @method Debt    setMember()    Sets the current record's "Member" value
 * @method Debt    setIncome()    Sets the current record's "Income" value
 * 
 * @package    piwam
 * @subpackage model
 * @author     Adrien Mogenet
 * @version    SVN: $Id: Builder.php 6820 2009-11-30 17:27:49Z jwage $
 */
abstract class BaseDebt extends sfDoctrineRecord
{
    public function setTableDefinition()
    {
        $this->setTableName('piwampg_debt');
        $this->hasColumn('id', 'integer', 4, array(
             'type' => 'integer',
             'primary' => true,
             'autoincrement' => true,
             'length' => '4',
             ));
        $this->hasColumn('member_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));
        $this->hasColumn('income_id', 'integer', 4, array(
             'type' => 'integer',
             'notnull' => true,
             'length' => '4',
             ));

        $this->option('collate', 'utf8_unicode_ci');
        $this->option('charset', 'utf8');
    }

    public function setUp()
    {
        parent::setUp();
        $this->hasOne('Member', array(
             'local' => 'member_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $this->hasOne('Income', array(
             'local' => 'income_id',
             'foreign' => 'id',
             'onDelete' => 'CASCADE'));

        $timestampable0 = new Doctrine_Template_Timestampable();
        $this->actAs($timestampable0);
    }
}