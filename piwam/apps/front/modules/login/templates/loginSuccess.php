<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <?php include_title() ?>
    <?php use_stylesheet('login.css') ?>
    <?php include_stylesheets() ?>
    <link rel="shortcut icon" href="<?php echo $sf_request->getRelativeUrlRoot() ?>/favicon.ico" />
</head>
<body>

    <!-- Set Jquery's noConflict mode -->

    <script type="text/javascript">var J = jQuery.noConflict();</script>

    <div id="login">
        <div id="container">


            <!-- The left panel -->

            <div id="left">
                <h1>Piwam 1.2-dev</h1>

                <!-- If there is only one registered association, then
                     we display some information about this association -->

                <?php if ($numberOfAssociations == 1): ?>
                    <div>
                        Rejoignez les <?php echo $association->getNumberOfEnabledMembers() ?>
                        membres de <i><?php echo $association->getName() ?></i>

                        <!-- Display a small icon with link to the association
                             website if exists -->

                        <?php if ($association->getWebsite() != null): ?>
                            <?php echo link_to(image_tag('external', array('align' => 'absmiddle')),
                            $association->getWebsite()) ?>
                        <?php endif ?>

                        ,<br /><br />
                        <?php echo link_to("déposez une demande d'adhésion", '@member_ask_subscription')?>

                        <?php if ($association->getDescription()): ?>
                            <br /><br />
                            <strong>En quelques mots :</strong><br />
                            <?php echo $association->getDescription() ?>
                        <?php endif ?>
                    </div>
                <?php endif ?>

                <?php if ($displayRegisterLink): ?>
                    <div>
                        Ou enregistrez une <?php echo link_to('nouvelle association', '@association_new') ?>
                    </div>
                <?php endif ?>

            </div>



            <!-- Right panel, with login form -->

            <div id="right">
                <h1>Authentification</h1>

                <?php if ($sf_user->hasFlash('error')):?>
                    <p class="error">
                        <?php echo image_tag('error', array('alt' => '[erreur]', 'align' => 'top')) . ' ' . $sf_user->getFlash('error') ?>
                    </p>
                <?php endif ?>

                <form action="<?php echo url_for('@login') ?>" method="post">
                    <div>
                        <?php echo $form->renderGlobalErrors() ?>

                        <?php echo $form['username']->renderLabel() ?>
                        <?php echo $form['username']->renderError() ?>
                        <div class="input">
                            <?php echo $form['username'] ?>
                        </div>

                        <?php echo $form['password']->renderLabel() ?>
                        <?php echo $form['password']->renderError() ?>
                        <div class="input">
                            <?php echo $form['password'] ?>
                            <?php echo link_to('Mot de passe oublié ?', '@retrieve_password') ?>
                        </div>
                    </div>

                    <div>
                        <h2>Ou utilisez OpenID</h2>

                        <?php echo $form['openid']->renderLabel() ?>
                        <?php echo $form['openid']->renderError() ?>
                        <div class="input">
                            <?php echo $form['openid'] ?>
                        </div>
                    </div>

                    <div id="foot">
                        <input type="submit" value="S'identifier" class="grey button" name="S'identifier" />
                    </div>
               </form>
            </div> <!-- right div -->

        </div> <!-- container div -->
        <hr class="clear" />

    </div> <!-- login div -->
</body>
</html>