<?php

/**
 * Created by IntelliJ IDEA.
 * User: Huulktya
 * Date: 9/28/14
 * Time: 2:46 PM
 */
class CollapserTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var Collapser
     */
    private $collapser;

    public function setUp()
    {
        $this->collapser = new Collapser([1, 2, 3], new Addition());
    }

    public function tearDown()
    {
        $this->collapser = null;
    }

    public function testArraySwitch()
    {
        $this->collapser->setList([4, 5, 6]);
        $this->assertThat($this->collapser->getList(), $this->equalTo([4, 5, 6]));
    }

    public function testStrategySwitch()
    {
        $this->collapser->setStrategy(new Subtraction());
        $this->assertThat($this->collapser->getStrategy(), $this->isInstanceOf("Subtraction"));
    }

    public function testCollapse() {
        $this->assertThat($this->collapser->collapse(), $this->equalTo(6));
    }

    /**
     * @expectedException IllegalStateException
     */
    public function testCollapseNoStrategy() {
        $this->collapser = new Collapser([123]);
        $this->collapser->collapse();
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadData() {
        $this->collapser->setList(["abv"]);
        $this->collapser->collapse();
    }
}
 