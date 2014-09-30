<?php
/**
 * Created by IntelliJ IDEA.
 * User: Huulktya
 * Date: 9/28/14
 * Time: 2:48 PM
 */

interface CollapseStrategy {
    public function collapse($arg1, $arg2);
    public function getBaseCase();
} 