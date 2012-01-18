<?php use_helper('Date') 	?>
<?php use_helper('Member') 	?>
<?php use_helper('Phone')  ?>
<?php use_helper('Boolean') ?>
<?php use_helper('JavascriptBase') ?>
<?php use_javascript('domtab/domtab.js') ?>
<?php use_stylesheet('domtab.css') ?>

<!-- Defines existing tabs -->

<div class="domtab">
<ul class="domtabs">
    <li><a href="#t1">Profil</a></li>
    <li><a href="#t2">Cotisations</a></li>
    <li><a href="#t3">Droits</a></li>
</ul>



<!-- First tab : user profile-->

<div>
    <h2><a name="t1" id="t1">Informations détaillées</a></h2>

    <table class="details">

        <tfoot>
            <tr>
                <td colspan="2">
                    <?php echo link_to('Éditer', '@member_edit?id=' . $member->getId() . '#profil', array('class'  => 'grey button')) ?>
                </td>
            </tr>
        </tfoot>
        <tbody>
            <tr>
                <th>Photo :</th>
                <td><?php echo image_tag($member->getPictureURI()) ?></td>
            </tr>
            <tr>
                <th>Nom :</th>
                <td><?php echo $member->getLastname() ?></td>
            </tr>
            <tr>
                <th>Prénom :</th>
                <td><?php echo $member->getFirstname() ?></td>
            </tr>
            <tr>
                <th>Pseudo :</th>
                <td><?php echo $member->getUsername() ?></td>
            </tr>
            <tr>
                <th>Statut :</th>
                <td><?php echo $member->getStatus() ?></td>
            </tr>
            <tr>
                <th>Date d'inscription :</th>
                <td><?php echo format_date($member->getSubscriptionDate()) ?></td>
            </tr>

            <!-- Display due state -->
            
            <?php if ($member->getDueExempt()): ?>
              <tr>
                  <th>Exempté de cotisation :</th>
                  <td><?php echo boolean2icon($member->getDueExempt()) ?></td>
              </tr>
            <?php else: ?>
              <tr>
                <th>Prochaine cotisation :</th>

                <!-- Has never paid a Due -->

                <?php if ($member->getNumberOfDues() == 0): ?>
                  <td>N'a jamais cotisé</td>
                <?php else: ?>

                  <!-- Custom message if due has expired -->

                  <?php if ($member->getDaysBeforeNextDue() < 0): ?>
                    <td>Expirée depuis <b><?php echo - $member->getDaysBeforeNextDue() ?></b> jours</td>
                  <?php else: ?>
                    <td>Dans <b><?php echo $member->getDaysBeforeNextDue() ?></b> jours</td>
                  <?php endif ?>
                    
                <?php endif ?>
              </tr>
            <?php endif ?>

            <tr>
                <th>Adresse :</th>
                <td><?php echo $member->getStreet() . '<br />' . $member->getZipcode() . ' ' . $member->getCity() ?></td>
            </tr>
            <tr>
                <th>Pays :</th>
                <td><?php echo image_tag('flags/' . strtolower($member->getCountry()), array('alt' => $member->getCountry(), 'title' => $member->getCountry())) ?></td>
            </tr>
            <tr>
                <th>Email :</th>
                <td><?php echo mail_to($member->getEmail()) ?></td>
            </tr>
            <tr>
                <th>Site Internet :</th>
                <td><?php echo '<a href="' . $member->getWebsite() . '">' . $member->getWebsite() . '</a>' ?></td>
            </tr>
            <tr>
                <th>Téléphone fixe :</th>
                <td><?php echo format_phonenumber($member->getPhoneHome()) ?></td>
            </tr>
            <tr>
                <th>Téléphone portable :</th>
                <td><?php echo format_phonenumber($member->getPhoneMobile()) ?></td>
            </tr>
            <tr>
                <th>Actif :</th>
                <td><?php echo boolean2icon($member->getState()) ?></td>
            </tr>

            <!-- Display extra rows -->

            <?php foreach ($member->getMemberExtraValue() as $extraValue): ?>
              <tr>
                <th><?php echo $extraValue->getRow()->getLabel() ?> :</th>
                <td><?php echo $extraValue->getFormattedValue() ?></td>
              </tr>
            <?php endforeach ?>

            <!-- End of extra rows -->

            <tr>
                <th>
                    <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                    Enregistré le :
                </th>
                <td><?php echo format_datetime($member->getCreatedAt(), 'dd/MM/yyyy HH:mm') . ' par ' . format_member($member->getCreatedByMember()) ?></td>
            </tr>
            <tr>
                <th>
                    <?php echo image_tag('time.png', array('align' => 'absmiddle', 'alt' => 'Time'))?>
                    Dernière édition :
                </th>
                <td>
                    <?php echo format_datetime($member->getUpdatedAt(), 'dd/MM/yyyy HH:mm') . ' par ' . format_member($member->getUpdatedByMember()) ?>
                </td>
            </tr>
        </tbody>
    </table>
</div>



<!-- Second tab : Dues -->

<div>
    <h2><a name="t2" id="t2">Liste des cotisations</a></h2>
    <div id="listOfCotisation" class="info">
        <ul>
            <?php if (count($cotisations) == 0): ?>
                <li><i>Aucune cotisation versée par ce membre.</i></li>
            <?php endif ?>

            <?php foreach ($cotisations as $cotisation): ?>
                <li><?php echo $cotisation->getDueType() ?> versée le <?php echo $cotisation->getDate() ?></li>
            <?php endforeach ?>
        </ul>
    </div>
</div>



<!-- Third tab : Credentials -->

<div>
  <h2><a name="t3" id="t3">Droits de l'utilisateur</a></h2>
  <div>
    <ul>
        <?php if (count($credentials) == 0): ?>
            <li><i>Ce membre n'a aucun droit pour le moment.</i></li>
        <?php endif ?>

        <?php foreach ($credentials as $credential): ?>
            <li>&bull; <?php echo $credential->getAclAction()->getLabel() ?></li>
        <?php endforeach ?>
    </ul>
    <br />
    <?php echo link_to('Éditer', '@member_edit?id=' . $member->getId() . '#credentials', array('class' => 'grey button')) ?>
  </div>
</div>


</div>
<!-- domtab -->
