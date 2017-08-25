<?php
namespace rowe\printerHelper;

/**
 * Net printer class
 * User: Rowe
 * Date: 2017/8/10
 * Time: 14:25
 */
class NetPrinter extends Printer
{

    private $_host;

    public function getHost()
    {
        return $this->_host;
    }

    public function setHost($host)
    {
        $this->_host = $host;
    }

    public function __construct($host)
    {
        $this->setHost($host); //TODO check host
        parent::__construct();
    }

    public function connect()
    {

    }

    public function send($message)
    {

    }


}