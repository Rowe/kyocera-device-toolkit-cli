<?php
require_once "vendor/autoload.php";

use rowe\printerHelper\KyoceraPrinter;
use Aura\Cli\CliFactory;
use Aura\Cli\Help;
use Aura\Cli\Context\OptionFactory;

$cli_factory = new CliFactory;
$stdio = $cli_factory->newStdio();
$context = $cli_factory->newContext($GLOBALS);
$argv = $context->argv->get();


$getopt = $context->getopt([
    'list', 'l',
    'host:', 'h:',
    'action:', 'a:',
]);


if ($getopt->hasErrors()) {
    $errors = $getopt->getErrors();
    foreach ($errors as $error) {
        $stdio->errln($error->getMessage());
    }
};


$help = new Help(new OptionFactory);

$help->setOptions(array(
    'h,host' => "The -h/--host connect a device in the network.",
    '' => "The --bar option description.",
    '#arg1' => "The description for argument 1.",
    '#arg2?' => "The description for argument 2.",
));


$list = $getopt->get('--list', $getopt->get('-l'));
$host = $getopt->get('--host', $getopt->get('-h'));
$action = $getopt->get('--action', $getopt->get('-a'));


if ($list) {
    //TODO Discover the printers within the network
} else if ($host) {
    preg_match('/((2[0-4]\d|25[0-5]|[01]?\d\d?)\.){3}(2[0-4]\d|25[0-5]|[01]?\d\d?)/', $host, $matches);
    if ($matches) {
        $host = $matches[0];
        $printer = new KyoceraPrinter($host);

        switch ($action) {
            case 'restart':
                $printer->restart();
                break;
            case  'panel';
                $printer->getPanelMessage();
                break;
            case 'wakeup':
                $printer->wakeUp();
                break;
        }
    } else {
        $stdio->errln('The input host name:' . $host . ' is illegal value.');
    }
}

exit(\Aura\Cli\Status::USAGE);


?>
