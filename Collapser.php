<?php
/**
 * Created by IntelliJ IDEA.
 * User: Huulktya
 * Date: 9/28/14
 * Time: 2:42 PM
 */

class Collapser {

    /**
     * @var array
     */
    private $list;
    /**
     * @var CollapseStrategy
     */
    private $strategy;

    /**
     * Create a new collapser with a given list, and an optional strategy
     * @param array $list The list to collapse
     * @param CollapseStrategy $strategy The strategy to use
     */
    public function __construct($list, $strategy = null) {
        $this->list = $list;
        $this->strategy = $strategy;
    }

    /**
     * Switch the strategy for this collapser
     * @param CollapseStrategy $strategy
     * @throws InvalidArgumentException
     */
    public function setStrategy(CollapseStrategy $strategy)
    {
        $this->strategy = $strategy;
    }

    /**
     * Change the list to collapse
     * @param array $list
     */
    public function setList(array $list)
    {
        $this->list = $list;
    }

    /**
     * Get the current list
     * @return mixed
     */
    public function getList()
    {
        return $this->list;
    }

    /**
     * Get the current collapse strategy
     * @return CollapseStrategy
     */
    public function getStrategy()
    {
        return $this->strategy;
    }

    public function collapse()
    {
        if(!isset($this->strategy)) {
            throw new IllegalStateException;
        }
        $collapsedVal = $this->strategy->getBaseCase();
        foreach($this->getList() as $item) {
            $collapsedVal = $this->strategy->collapse($collapsedVal, $item);
        }
        return $collapsedVal;
    }


} 