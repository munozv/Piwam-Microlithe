<?php use_javascript('domtab/domtab.js') ?>
<?php use_stylesheet('domtab.css') ?>

<div class="domtab">

    <!-- List of tabs -->
    <ul class="domtabs">
        <li><a href="#profil">Profil du membre</a></li>
        <li><a href="#credentials">Gestion des droits</a></li>
    </ul>

    <!-- First tab : edit profile -->
    <div>
        <h2><a name="profil" id="profil">Editer les informations</a></h2>
        <?php include_partial('form', array('form' => $form)) ?>
    </div>

    <!-- Second tab : edit credentials -->
    <div>
        <h2><a name="credentials" id="credentials">Gérer les droits</a></h2>
        <?php if ($canEditRight): ?>
            <?php include_partial('aclForm', array('form' => $aclForm, 'user_id' => $user_id)) ?>
        <?php else: ?>
            <p>
                Désolé, vous n'avez pas les droits suffisants pour éditer les droits de
                l'utilisateur !
            </p>
        <?php endif; ?>
    </div>
</div>
