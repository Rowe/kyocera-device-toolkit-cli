<?php
namespace rowe\printerHelper;
/**
 * Created by PhpStorm.
 * User: kyocera
 * Date: 2017/8/11
 * Time: 17:27
 */

use rowe\printerHelper\NetPrinter;

class KyoceraPrinter extends NetPrinter
{

    public function restart()
    {
        echo 'restarting...';
    }

    public function wakeUp()
    {

    }

    public function getPanelMessage()
    {

    }

    public function toner()
    {

    }
}