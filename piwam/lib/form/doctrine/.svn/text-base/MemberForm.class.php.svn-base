<?php
/**
 * Member form.
 *
 * @package    piwam
 * @subpackage form
 * @author     Adrien Mogenet
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class MemberForm extends BaseMemberForm
{
  private $_firstRegistration = false;

  /**
   * Determines if we are performing the registration of the
   * first user or not
   *
   * @return  boolean
   * @since r33
   */
  public function isFirstRegistration()
  {
    return $this->_firstRegistration;
  }

  /**
   * Customizes the Member form. There is a lot of fields to unset in order
   * to re-create them from scratch with custom behaviour, especially the
   * hidden references (association, granted user id...)
   *
   * r33 : At the beginning of the process we determine if we are registering
   *       the first Membre of a new association or not
   */
  public function configure()
  {
    $context = $this->getOption('context');
    $this->_firstRegistration = $this->getOption('first', false);

    if (! $associationId = $this->getOption('associationId'))
    {
      throw new InvalidArgumentException('You must provide the association ID');
    }

    unset($this['created_at'], $this['updated_at']);
    unset($this['created_by'], $this['updated_by']);
    unset($this['state'], $this['association_id']);
    unset($this['password']);

    if ($this->getObject()->isNew())
    {
      // If this is the user is not the one who
      // is currently registering a new Association

      if (! $this->isFirstRegistration())
      {
        $this->widgetSchema['created_by'] = new sfWidgetFormInputHidden();
        $this->setDefault('created_by', $context->getUser()->getUserId());
        $this->validatorSchema['created_by'] = new sfValidatorInteger(array('required' => false));
      }
    }
    else
    {
      $this->widgetSchema['updated_by'] = new sfWidgetFormInputHidden();
      $this->validatorSchema['updated_by'] = new sfValidatorInteger();
    }

    $this->widgetSchema['state'] = new sfWidgetFormInputHidden();
    $this->widgetSchema['status_id']->setOption('query', StatusTable::getQueryEnabledForAssociation($associationId));
    $this->widgetSchema['password'] = new sfWidgetFormInputPassword();

    /*
     * if this is not the registration of the first user who is
     * setting up a new Association, password can be empty (and
     * the user won't be able to log in)
     * Otherwise, user MUST give a passsword and pseudo
     */

    if (! $this->isFirstRegistration())
    {
      $this->validatorSchema['password'] = new sfValidatorString(array('required' => false));

      if ($this->_isUsernameMandatory($associationId))
      {
        // Password is not mandatory because if we are here, we are
        // editing the existing admin user
        // So if no password has been provided, password won't be
        // erased

        $this->validatorSchema['username'] = new sfValidatorString(array('required' => true));
      }
      else
      {
        $this->validatorSchema['username'] = new sfValidatorString(array('required' => false));
      }
    }
    else
    {
      $this->validatorSchema['password'] = new sfValidatorString(array('required' => true));
      $this->validatorSchema['username'] = new sfValidatorString(array('required' => true));
    }

    $this->widgetSchema['association_id'] = new sfWidgetFormInputHidden();
    $this->validatorSchema['association_id'] = new sfValidatorInteger();
    $this->setDefault('association_id', $associationId);

    $this->validatorSchema->setPostValidator(new sfValidatorDoctrineUnique(array('model' => 'Member', 'column' => 'username'), array('invalid' => 'Ce pseudo existe déjà')));

    unset($this->validatorSchema['email']);
    unset($this->validatorSchema['website']);
    $this->validatorSchema['email'] = new sfValidatorEmail(array('required' => false));
    $this->validatorSchema['website'] = new sfValidatorUrl(array('required' => false));
    $this->validatorSchema['state'] = new sfValidatorInteger();

    unset ($this->widgetSchema['country']);
    $countries = array('FR', 'BE', 'ES', 'DE', 'NL', 'CH', 'LU');
    $this->widgetSchema['country'] = new sfWidgetFormI18nChoiceCountry(array('culture' => 'fr', 'countries' => $countries));
    $this->setDefault('country', 'FR');

    unset ($this->widgetSchema['subscription_date']);
    $context->getConfiguration()->loadHelpers("Asset");
    $this->widgetSchema['subscription_date'] = new sfWidgetFormJQueryDate(array(
      'image'   => image_path('calendar.gif'),
      'config'  => '{}',
      'culture' => 'fr_FR',
      'format'  => '%day%.%month%.%year%',
      'years'   => DateTools::rangeOfYears(date('Y'), 1900),
    ));

    $this->widgetSchema['picture'] = new sfWidgetFormInputFile();
    $this->validatorSchema['picture'] = new sfValidatorFile(array(  'path'       => MemberTable::PICTURE_DIR,
                                                                    'required'   => false,
                                                                    'mime_types' => 'web_images',
                                                                    'max_size'   => 1024 * 500
                                                                  ),
                                                            array(  'max_size'   => 'La taille du fichier est trop importante',
                                                                    'mime_types' => 'Seules les images sont acceptées'
                                                                  )
                                                            );
    $this->setDefault('subscription_date', date('d-m-Y'));
    $this->setDefault('state', 1);
    $this->_setCssClasses();
    $this->_disableProtectedFields($context->getUser());
    $this->_setLabels();


    if (false == $this->isNew())
    {
      $memberId  = $this->getObject()->getId();
      $extraForm = new MemberExtraRowsForm(null, array('member_id' => $memberId));
    }
    else
    {
      $extraForm = new MemberExtraRowsForm();
    }

    $this->embedForm('extra_rows', $extraForm);
  }

  /*
   * Check if we can delete the pseudo (we can't delete the pseudo of the
   * "master" member
   */
  private function _isUsernameMandatory($associationId)
  {
    if ((false === $this->getObject()->isNew()) && $this->getObject()->getId())
    {
      $association = AssociationTable::getById($associationId);

      if ($this->getObject()->getId() == $association->getCreatedBy())
      {
        return true;
      }

      return false;
    }
    else
    {
      return false;
    }
  }

  /*
   * Set widget labels
   */
  private function _setLabels()
  {
    $this->widgetSchema->setLabels(array(
      'firstname'         => 'Prénom',
      'lastname'          => 'Nom',
      'username'          => "Nom d'utilisateur",
      'password'          => 'Mot de passe',
      'status_id'         => 'Statut',
      'due_exempt'        => "Exempté de cotisation",
      'subscription_date' => "Date d'adhésion",
      'picture'           => 'Photo',
      'street'            => 'Rue',
      'zipcode'           => 'Code postal',
      'city'              => 'Ville',
      'country'           => 'Pays',
      'email'             => 'Adresse e-mail',
      'website'           => 'Site internet/blog',
      'phone_home'        => 'Téléphone fixe',
      'phone_mobile'      => 'Téléphone mobile',
    ));
  }

  /*
   * Set an appropriate CSS class to each form element
   */
  private function _setCssClasses()
  {
    $this->widgetSchema['lastname']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['firstname']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['username']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['password']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['street']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['zipcode']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['city']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['country']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['website']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['email']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['phone_home']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['phone_mobile']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['status_id']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['country']->setAttribute('class', 'formInputNormal');
    $this->widgetSchema['picture']->setAttribute('class', 'file');
  }

  /*
   * Disable some fields that can't be changed if user has not
   * required credentials
   */
  private function _disableProtectedFields(myUser $user)
  {
    $associationId = $this->getOption('associationId');

    if (! $user->hasCredential('add_due'))
    {
      $this->widgetSchema['due_exempt'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['fake_due_exempt'] = new sfWidgetFormInputCheckbox();
      $this->widgetSchema['fake_due_exempt']->setAttribute('disabled', 'disabled');
      $this->setDefault('fake_due_exempt', $this->getValue('due_exempt'));
    }

    if (! $user->hasCredential('add_status'))
    {
      $this->widgetSchema['status_id'] = new sfWidgetFormInputHidden();
      $this->widgetSchema['fake_status_id'] = new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Status'), 'add_empty' => false));
      $this->widgetSchema['fake_status_id']->setOption('query', StatusTable::getQueryEnabledForAssociation($associationId));
      $this->widgetSchema['fake_status_id']->setAttribute('disabled', 'disabled');
      $this->setDefault('fake_status_id', $this->getValue('status_id'));
      $this->widgetSchema['fake_status_id']->setAttribute('class', 'formInputNormal');

      /*
       * we need to provide a default value if user has not rights but is
       * registering a new Member. It can happen in at least 2 situations :
       *
       *    - first member is registering himself
       *    - a member is creating a pending subscription
       */

      $this->setDefault('status_id', StatusTable::getDefaultValue($associationId));
    }
  }
}
