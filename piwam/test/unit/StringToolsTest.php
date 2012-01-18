<?php
include(dirname(__FILE__).'/../bootstrap/unit.php');

$t = new lime_test(7, new lime_output_color());

$t->is(StringTools::to7bit('easy test'),            'easy test',        'No modification');
$t->is(StringTools::to7bit('test accentué'),        'test accentue',    'With basic accent');
$t->is(StringTools::to7bit('àéêÔÊÂÇòè'),            'aeeOEACoe',        'Complex acents and cedilla');
$t->is(StringTools::to7bit('||πñàéêÔÊÂÇòèø'),       'pnaeeOEACoeo',     'Complex acents, cedilla and special chars');
$t->isnt(StringTools::generatePassword(),           StringTools::generatePassword(), 'Both passwords are different');
$t->is(strlen(StringTools::generatePassword(5)),    5,                  'Can specify a length');
$t->is(strlen(StringTools::generatePassword()),     8,                  'Default length is 8');
$t->is(StringTools::slugify('classic'),             'classic',          'No slug modification');
$t->is(StringTools::slugify('it\'s_classic'),       'it_s_classic',     'Basic slug');
$t->is(StringTools::slugify('_-//\\!? '),           '_______',          'Only slug');
$t->is(StringTools::slugify('_-//\\!? ', '/'),      '///////',          'Only slug, with custom replacement');
?>