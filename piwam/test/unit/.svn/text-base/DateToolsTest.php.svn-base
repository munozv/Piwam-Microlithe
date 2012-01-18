<?php
include(dirname(__FILE__).'/../bootstrap/unit.php');

$t      = new lime_test(7, new lime_output_color());
$date1  = new DateTools('2008-12-30', 'Y-m-d');

$t->is($date1->add('mo', '1', true),    '2009-01-30',   'Add 1 month, only returning value');
$t->is($date1->add('d', '1', false),    '2008-12-31',   'Add 1 day');
$t->is($date1->add('mo', '1', false),   '2009-01-30',   'Add 1 month, dealing with 30/31 issue');

$t->is($date1->getDaysBetween('2009-12-01', '2009-12-03'), '2', 'Days between 2 simple dates, format 1');
$t->is($date1->getDaysBetween('01-12-2009', '03-12-2009'), '2', 'Days between 2 simple dates, format 2');
$t->is($date1->getDaysBetween('2009-12-30', '2010-01-02'), '3', 'Days between 2 complex dates, format 1');
$t->is($date1->getDaysBetween('30-12-2009', '02-01-2010'), '3', 'Days between 2 complex dates, format 2');
?>