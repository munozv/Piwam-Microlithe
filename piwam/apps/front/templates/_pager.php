<?php
/**
 * This partial displays a page list according to the
 * sfDoctrine object given as argument
 */


/*
 * Perform the 'params' parameter and build a string
 * to add within our paging links
 */
if (isset($params))
{
    $urlParams = '';

    foreach ($params as $key => $value)
    {
        $urlParams .= '&' . $key . '=' . $value;
    }
}
?>

<?php if ($pager->haveToPaginate()): ?>
    <div id="pager">
        <ul id="pagination">

            <!-- Display 'previous' link, disabled if there is no previous page -->

            <?php if ($pager->getPage() > 1): ?>
                <li class="previous"><?php echo link_to('&laquo; Précédent', $route . '?page=' . $pager->getPreviousPage() . $urlParams) ?></li>
            <?php else: ?>
                <li class="previous-off">&laquo; Précédent</li>
            <?php endif ?>


            <!--  Generate page list. Apply a special style if this
                  is the current page  -->

            <?php $links = $pager->getLinks(); ?>
            <?php foreach ($links as $page): ?>
                <?php if ($page == $pager->getPage()): ?>
                    <li class="active"><?php echo $page ?></li>
                <?php else: ?>
                    <li><?php echo link_to($page, $route . '?page=' . $page . $urlParams) ?></li>
                <?php endif ?>
            <?php endforeach ?>


            <!-- Display 'next' link, disabled if there is no next page -->

            <?php if ($pager->getPage() == $pager->getCurrentMaxLink()): ?>
                <li class="next-off">Suivant &raquo;</li>
            <?php else: ?>
                <li class="next"><?php echo link_to('Suivant &raquo;', $route . '?page=' . $pager->getNextPage() . $urlParams) ?></li>
            <?php endif ?>
        </ul>
    </div>
<?php endif ?>
