<?php use_helper('Date') ?>

<h2>Liste des activités</h2>

<table class="datalist">

    <!-- Header, describes columns -->

    <thead>
        <tr>
            <th>Libellé</th>
            <th>Créée le</th>
            <th class="actions">Actions</th>
        </tr>
    </thead>


    <!-- Display entries -->

    <tbody>
        <?php foreach ($activities as $activity): ?>
            <?php include_partial('activityRow', array('activity' => $activity)) ?>
        <?php endforeach ?>
    </tbody>
</table>


<br />
<?php echo link_to('Nouvelle activité', '@activity_new', array('class' => 'add grey button')) ?>

