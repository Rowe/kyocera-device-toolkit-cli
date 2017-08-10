<?php

namespace rowe\printerHelper;

/**
 * Created by PhpStorm.
 * User: Rowe
 * Date: 2017/8/10
 * Time: 0:21
 */
class Printer
{

    private $_actions;

    public function __construct($action = [])
    {
        if (is_array($action) && (count($action) > 0)) {
            foreach ($action as $a) {
                if ($a instanceof PrinterAction) {
                    $this->attachAction($a);
                }
            }
        } else if ($action instanceof PrinterAction) {
            $this->attachAction($action);
        }
    }

    public function attachAction($action)
    {
        $class = new $action;
        $this->_actions[$class->getName()] = $class;
    }

    public function detachAction($action)
    {
        unset($this->_actions[$action->getName()]);
    }

    public function runAction($actionName)
    {
        return $this->_actions[$actionName]->run();
    }
}