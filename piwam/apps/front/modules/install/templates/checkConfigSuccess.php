<h2>Vérification de la configuration</h2>

<ul class="no-style">
    <?php foreach ($messages as $message): ?>
        <li class="<?php echo $message['cssClass'] ?>">
            <?php include_partial($message['partial'], array('error' => $message['error'])) ?>
        </li>
    <?php endforeach; ?>
</ul>


<!-- If no error occured, we display the button -->

<?php if ($displayButton): ?>
    <br /><?php echo link_to('Suivant', '@config_db', array('class' => 'grey button')) ?>
<?php endif; ?>