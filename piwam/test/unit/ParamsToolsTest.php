<?php
include(dirname(__FILE__).'/../bootstrap/unit.php');

$t      = new lime_test(8, new lime_output_color());
$aTest  = array(
            'key1'  => 'value1',
            'key2'  => 2,
            3       => 'value3',
            );

$t->is(ParamsTools::get_ifset($aTest, 'key1'),      'value1',   'String key, without default value');
$t->is(ParamsTools::get_ifset($aTest, 'key1', 42),  'value1',   'String key, without default value');
$t->is(ParamsTools::get_ifset($aTest, 'key2'),      2,          'String key, Int result, without default value');
$t->is(ParamsTools::get_ifset($aTest, 'key2', 42),  2,          'String key, Int result, without default value');
$t->is(ParamsTools::get_ifset($aTest, 3),           'value3',   'Int key, without default value');
$t->is(ParamsTools::get_ifset($aTest, 3, 42),       'value3',   'Int key, without default value');
$t->is(ParamsTools::get_ifset($aTest, 'key0', 42),  42,         'Wrong string key, with default value');
$t->is(ParamsTools::get_ifset($aTest, 'key0'),      false,      'Wrong string key, without default value');
?>