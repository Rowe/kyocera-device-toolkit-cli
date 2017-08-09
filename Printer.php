<?php

/**
 * Created by PhpStorm.
 * User: Rowe
 * Date: 2017/8/10
 * Time: 0:21
 */
abstract class Printer
{
    const STATUS_ONLINE = 1;
    const STATUS_OFFLINE = 2;
    const STATUS_PRINTING = 3;
    const STATUS_LOWPOWER = 4;
    const STATUS_SLEEPING = 5;
    CONST STATUS_PAPERJAM = 6;


    /**
     * Printer restart function
     * The sub class should  implement this method
     * @return mixed
     */
    abstract protected function restart();


    /**
     * Printer wake up function
     * The sub class should implement this method
     * @return mixed
     */
    abstract protected function wakeUp();


    /**
     * Retrieve printer status
     *
     * @return mixed
     */
    abstract protected function status();


}