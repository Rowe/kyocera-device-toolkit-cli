<?php
require_once "vendor/autoload.php";

use rowe\printerHelper\Printer;

$printer = new Printer();

$service_port = 80;
$address = '10.170.80.151';
//
//$netPrinter = new \rowe\printerHelper\NetPrinter('10.170.80.151');
//$netPrinter->attachAction(\rowe\printerHelper\GetPanelMsg::class);
//echo $netPrinter->runAction('getPanelMsg');
echo "接收到{$argc}个参数";
print_r($argv);