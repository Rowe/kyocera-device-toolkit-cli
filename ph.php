<?php
require_once "vendor/autoload.php";


use Aura\Cli\CliFactory;

$cli_factory = new CliFactory;
$stdio = $cli_factory->newStdio();

$context = $cli_factory->newContext($GLOBALS);

$env = $context->env->get();
$server = $context->server->get();
$argv = $context->argv->get();


$options = array(
    'h:,host:',        // short flag -a, parameter is not allowed
    'b:',       // short flag -b, parameter is required
    'c::',      // short flag -c, parameter is optional
    'foo',      // long option --foo, parameter is not allowed
    'bar:',     // long option --bar, parameter is required
    'baz::',    // long option --baz, parameter is optional
    'g*::',     // short flag -g, parameter is optional, multi-pass
);

$getopt = $context->getopt($options);

$a = $getopt->get('-a', false); // true if -a was passed, false if not
$b = $getopt->get('-b');
$c = $getopt->get('-c', 'default value');
$foo = $getopt->get('--foo', 0); // true if --foo was passed, false if not
$bar = $getopt->get('--bar');
$baz = $getopt->get('--baz', 'default value');
$g = $getopt->get('-g', []);
$host = $getopt->get('-h');
$host2 = $getopt->get('--host');

if ($getopt->hasErrors()) {
    $errors = $getopt->getErrors();
    foreach ($errors as $error) {
        // print error messages to stderr using a Stdio object
        $stdio->errln($error->getMessage());
    }
};


//$cli_factory = new CliFactory;
//$stdio = $cli_factory->newStdio();
//
//$help = new Help(new OptionFactory);
//
//$help->setOptions(array(
//    'f,foo' => "The -f/--foo option description.",
//    'bar::' => "The --bar option description.",
//    '#arg1' => "The description for argument 1.",
//    '#arg2?' => "The description for argument 2.",
//));
//
//$stdio->outln($help->getHelp('my-command'));


$name = $getopt->get(1);

echo $name;

?>
