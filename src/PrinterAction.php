<?php

namespace rowe\printerHelper;

/**
 * Created by PhpStorm.
 * User: Rowe
 * Date: 2017/8/10
 * Time: 14:53
 */
abstract class PrinterAction
{
    private $_name;

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->_name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->_name = $name;
    }


    public function __construct($name)
    {
        $this->setName($name);
        $this->init();
    }

    public function init()
    {

    }

    abstract public function run();

}