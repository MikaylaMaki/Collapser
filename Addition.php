<?php
/**
 * Created by IntelliJ IDEA.
 * User: Huulktya
 * Date: 9/28/14
 * Time: 2:42 PM
 */

class Addition implements CollapseStrategy {


    public function collapse($arg1, $arg2)
    {
        if(!is_int($arg1) || !is_int($arg2)) {
            throw new InvalidArgumentException();
        }
        return $arg1 + $arg2;
    }

    public function getBaseCase()
    {
        return 0;
    }
}