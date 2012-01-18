<?php
/**
 * Display the picture of a member
 *
 * Inputs :
 *
 * 		- $member  : Membre object
 *
 * @since 	r139
 * @author 	Adrien Mogenet
 */
?>
<div class="user_picture">
	<?php echo link_to(image_tag($member->getPictureURI(), array('alt' => $member)), '@member_show?id=' . $member->getId()); ?>

	<div class="name">
	    <?php echo $member ?>
	</div>
</div>