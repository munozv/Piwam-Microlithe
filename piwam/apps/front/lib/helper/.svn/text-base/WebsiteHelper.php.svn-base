<?php
/**
 * Display a short URI for $website
 *
 *  http://foobar.org       => foobar.org
 *  http://www.foobar.org   => foobar.org
 *  www.foobar.org          => foobar.org
 *  foobar.org              => foobar.org
 *  http://bar.foobar.org   => bar.foobar.org
 */
function short_website_url($website)
{
    if (substr($website, 0, 7) === "http://") {
        $website = substr($website, 7, strlen($website) - 7);
    }
    if (substr($website, 0, 4) === "www.") {
        $website = substr($website, 4, strlen($website) - 4);
    }

    return $website;
}
?>