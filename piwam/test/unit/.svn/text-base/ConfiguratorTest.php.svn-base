<?php
include(dirname(__FILE__).'/../bootstrap/unit.php');

// We first retrieve an existing association
$association    = AssociationTable::getByName('The Fakers');
$associationId  = $association->getId();
$t              = new lime_test(8, new lime_output_color());

$t->is(Configurator::get('unknown', $associationId, 42),            42,                 'Get an non-existing variable with default value');
$t->is(Configurator::get('address', $associationId),                'info@piwam.org',   'Get an existing variable without default value');
$t->is(Configurator::get('address', $associationId, 'foo@bar.org'), 'foo@bar.org',      'Get an existing variable with default value');

try
{
    Configurator::get('unknown', $associationId);
    $t->fail('Get an non-existing variable without default value');
}
catch (Exception $e)
{
    $t->pass('Get an non-existing variable without default value');
}


try
{
    Configurator::set('unknown', 42, $associationId);
    $t->fail('Set an non-existing');
}
catch (Exception $e)
{
    $t->pass('Set an non-existing variable');
}


try
{
    Configurator::set('address', 'custom@domain.com', $associationId);
    $t->pass('Set an existing variable, must pass');
}
catch (Exception $e)
{
    $t->fail('Set an existing variable');
}


$t->is(Configurator::get('address', $associationId, 'foo@bar.org'), 'custom@domain.com',    'Get a newly set variable with default value');
$t->is(Configurator::get('address', $associationId), 'custom@domain.com',                   'Get a newly set variable without default value');
?>