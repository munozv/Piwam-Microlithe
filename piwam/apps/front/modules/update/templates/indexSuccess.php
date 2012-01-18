<h2>Mise à jour de Piwam</h2>

<table class="formtable">
    <tr>
        <th>Version actuelle de la base de données :</th>
        <td><pre><?php echo $currentDBVersion; ?></pre></td>
    </tr>
    <tr>
        <th>Fichiers SQL à exécuter :</th>

        <?php if (isset($error)): ?>
            <td>
                Erreur : <?php echo $error ?>
            </td>
        <?php else: ?>
            <td>
                <?php if (count($files) === 0): ?>
                    Aucun fichier à exécuter
                <?php else: ?>
                    <ul>
                        <?php foreach ($files as $file): ?>
                            <li><pre><?php echo $file ?></pre></li>
                        <?php endforeach ?>
                    </ul>
                <?php endif ?>
            </td>
        </tr>

        <?php if (count($files) !== 0): ?>
            <tr>
                <th>&nbsp;</th>
                <td><?php echo link_to('Exécuter', 'update/perform', array('class' => 'grey button')) ?>
                </td>
            </tr>
        <?php endif ?>

        <tr>
            <th>Dernière version en ligne :</th>
            <td>
                <?php if ($lastVersion == updateActions::CHECK_VERSION_ERROR): ?>
                    Impossible de vérifier en ligne. Rendez-vous directement sur <a href="http://piwam.googlecode.com">le site officiel</a>
                <?php elseif ($lastVersion == updateActions::CHECK_VERSION_OK): ?>
                    Version à jour
                <?php else: ?>
                    Une nouvelle version est disponible ! <a href="http://code.google.com/p/piwam/downloads/list">Piwam-<?php echo $lastVersion ?></a>
                <?php endif ?>
            </td>
        </tr>
    <?php endif?>
</table>