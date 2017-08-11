<?php
require_once "vendor/autoload.php";


use Aura\Cli\CliFactory;
use Aura\Cli\Help;
use Aura\Cli\Context\OptionFactory;

$cli_factory = new CliFactory;
$stdio = $cli_factory->newStdio();
$context = $cli_factory->newContext($GLOBALS);
$argv = $context->argv->get();


$options = [
    'host:', 'h:',      // short flag -a, parameter is not allowed
    'list', 'l',
    'restart', 'r',
    'wakeup', 'w',
    'panel', 'p',
    'sn', 's',
    'cassette', 'c',
    'toner', 't',

    // short flag -b, parameter is required
    'c::',      // short flag -c, parameter is optional
    'foo',      // long option --foo, parameter is not allowed
    'bar:',     // long option --bar, parameter is required
    'baz::',    // long option --baz, parameter is optional
    'g*::',     // short flag -g, para
];


$getopt = $context->getopt($options);

$host_short = $getopt->get('-h');
$host_long = $getopt->get('--host');

if ($getopt->hasErrors()) {
    $errors = $getopt->getErrors();
    foreach ($errors as $error) {
        // print error messages to stderr using a Stdio object
        $stdio->errln($error->getMessage());

        $help = new Help(new OptionFactory);

        $help->setOptions(array(
            'f,foo' => "The -f/--foo option description.",
            'bar::' => "The --bar option description.",
            '#arg1' => "The description for argument 1.",
            '#arg2?' => "The description for argument 2.",
        ));
        $stdio->outln($help->getHelp('printer-helper'));

    }
};

echo $host_long;
exit(\Aura\Cli\Status::USAGE);

?>
