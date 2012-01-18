<?php
/**
 * Login actions.
 *
 * @package    piwam
 * @subpackage login
 * @author     Adrien Mogenet
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class loginActions extends sfActions
{
  /**
   * Login action. This is the default action if we are not authenticated.
   * If we can't perform the Propel operations, we consider the database
   * settings are not correct and we redirect to /install automatically
   *
   * @param   sfWebRequest $request
   * @todo    Manage cookies
   */
  public function executeLogin(sfWebRequest $request)
  {
    if (! PiwamOperations::isInstalled())
    {
      $this->redirect('@setup');
    }

    $this->displayRegisterLink = $this->_canRegisterAnotherAssociation();
    $this->numberOfAssociations = AssociationTable::doCount();
    $this->form = new LoginForm();

    if (MemberTable::doCount() == 0)
    {
      $this->redirect('@association_new');
    }

    if ($this->numberOfAssociations === 1)
    {
      $this->association = AssociationTable::getUnique();
    }

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('login'));
      $login = $request->getParameter('login');
      $openId = $login['openid'];

      if ($openId)
      {
        $this->forward('login', 'openid');
      }

      if ($this->form->isValid())
      {
        $username = $login['username'];
        $password = $login['password'];
        $user = MemberTable::getByUsernameAndPassword($username, $password);

        if ($user instanceof Member)
        {
          $this->getUser()->login($user);

          // Unused cookie, fake value is set
          $this->getResponse()->setCookie(myUser::COOKIE_NAME, '1', time() + 60 * 60 * 24 * 15, '/');

          if (! $request->getCookie(myUser::COOKIE_NAME))
          {
            $this->getUser()->setFlash('error', 'Les cookies doivent être activés');
          }

          if ($this->getUser()->hasCredential('list_member'))
          {
            $this->redirect('@members_list');
          }
          else
          {
            $this->redirect('@member_show?id=' . $user->getId());
          }
        }
        else
        {
          if (null != MemberTable::getByUsername($username))
          {
            $this->getUser()->setFlash('error', "Le mot de passe est invalide", false);
          }
          else
          {
            $this->getUser()->setFlash('error', "Le nom d'utilisateur est invalide", false);
          }
        }
      }
    }

    $this->setLayout(false);
  }

  /**
   * Logout action. Redirect to homepage once credentials and cookies
   * have been removed.
   *
   * @param   sfWebRequest  $request
   * @since   r7
   */
  public function executeLogout(sfWebRequest $request)
  {
    $this->getUser()->logout();
    $this->redirect('@homepage');
  }

  /**
   * Allows an user to retrieve a forget password. Set flash message if user
   * does not exist or if password has been set correctly
   *
   * @param   sfWebRequest    $request
   */
  public function executeForgottenpassword(sfWebRequest $request)
  {
    $this->form = new ForgottenPasswordForm();
    $this->displayRegisterLink = $this->_canRegisterAnotherAssociation();

    if ($request->isMethod('post'))
    {
      $this->form->bind($request->getParameter('password'));
      $password = $request->getParameter('password');

      if ($this->form->isValid())
      {
        $user = MemberTable::getByUsername($password['username']);

        if ($user)
        {
          if ($user->getEmail())
          {
            $newPassword = StringTools::generatePassword(8);
            $user->setPassword($newPassword);
            $user->save();
            $this->_sendNewPassword($user, $newPassword);
          }
          else
          {
            $this->getUser()->setFlash('error', 'L\'utilisateur ne possède pas d\'adresse e-mail', false);
          }
        }
        else
        {
          $this->getUser()->setFlash('error', 'Le nom d\'utilisateur n\'existe pas', false);
        }
      }
    }
  }

  /**
   * Perform OpenID authentication
   *
   * @param sfWebRequest $sfWebRequest
   * @since 1.2
   */
  public function executeOpenid(sfWebRequest $request)
  {
    $login = $request->getParameter('login');
    $openId = $login['openid'];
  }

  /*
   * Send a new password to $member. $newPassword is the uncrypted
   * new password assigned to the $member
   */
  private function _sendNewPassword(Member $member, $newPassword)
  {
    $content   = "Bonjour {$member->getFirstname()},<br />
                  votre nouveau mot de passe pour acc&eacute;der au
                  gestionnaire d'association est : {$newPassword}<br />
                  Pour rappel, votre identifiant est {$member->getUsername()}";
                  
    $email     = $member->getEmail();
    $mailer    = MailerFactory::get($member->getAssociationId(), $this->getUser());
    $fromEmail = Configurator::get('address', $member->getAssociationId(), 'no-reply@piwam.org');
    $fromLabel = $member->getAssociation()->getName();

    $message = Swift_Message::newInstance('Votre mot de passe');
    $message->setBody($content);
    $message->setContentType('text/html');
    $message->setFrom(array($fromEmail => $fromLabel));
    $message->setTo(array($member->getEmail() => $member->getFirstname()));

    try
    {
      $mailer->send($message);
      $this->getUser()->setFlash('notice', 'Le nouveau mot de passe a été envoyé par e-mail', false);
    }
    catch (Swift_ConnectionException $e)
    {
      $this->getUser()->setFlash('error', 'Le mot de passe n\'a pas pu être envoyé par e-mail', false);
    }
  }

  /*
   * Check if we can register another new association. Because this method
   * is called in the default action, we check if PDO is correctly set up.
   *
   * If not, we redirect to install module
   */
  private function _canRegisterAnotherAssociation()
  {
    try
    {
      if (AssociationTable::doCount() === 0)
      {
        return true;
      }
      else
      {
        if (sfConfig::get('app_multi_association'))
        {
          return true;
        }

        return false;
      }
    }
    catch (Doctrine_Exception $e)
    {
      $this->redirect('@setup');
    }
    catch (Doctrine_Connection_Exception $e)
    {
      $this->redirect('@setup');
    }
  }
}
