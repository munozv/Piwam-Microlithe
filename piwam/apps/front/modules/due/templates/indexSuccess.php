<?php use_helper('Date') ?>
<?php use_helper('Number') ?>

<h2>Liste des cotisations</h2>

<!-- If dues have already been configured -->

<?php if ($typesExist): ?>

    <table class="datalist">
        <thead>
            <tr>
                <th>Compte</th>
                <th>Type</th>
                <th>Montant</th>
                <th>Membre</th>
                <th>Versée le</th>
                <th class="actions">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($duesPager->getResults() as $due): ?>
                <?php include_partial('dueRow', array('due' => $due)) ?>
            <?php endforeach ?>
        </tbody>
    </table>

    <br />
    <?php echo link_to('Enregistrer une cotisation', '@due_new', array('class' => 'add grey button')) ?>


    <?php include_partial('global/pager', array('pager' => $duesPager, 'route' => '@dues_list', 'params' => array())) ?>



<!-- No due type has been configured yet, we need to set one -->

<?php else: ?>

    <p>
        Aucun type de cotisation n'a été configuré pour le moment. <br />
        Avant d'enregistrer les cotisations de vos membres, vous devez <br />
        d'abord <?php echo link_to('créer un nouveau type de cotisation', '@duetype_new?first=1') ?>.
    </p>

<?php endif ?>