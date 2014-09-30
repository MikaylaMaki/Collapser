<?php
/**
 * Created by IntelliJ IDEA.
 * User: Huulktya
 * Date: 9/28/14
 * Time: 2:47 PM
 */

class AdditionTest extends PHPUnit_Framework_TestCase {
    /**
     * @var Addition
     */
    private $addition;

    public function setUp() {
        $this->addition = new Addition;
    }

    public function tearDown() {
        $this->addition = null;
    }

    public function testAddition() {
        $this->assertThat($this->addition->collapse(1,2), $this->equalTo(3));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadParams1() {
        $this->addition->collapse("ASD", new stdClass());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadParams2() {
        $this->addition->collapse("ASD", 1);
    }


    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadParams3() {
        $this->addition->collapse(1, new stdClass());
    }

    public function testBaseCase() {
        $this->assertThat($this->addition->getBaseCase(), $this->isType("int"));
        $this->assertThat($this->addition->getBaseCase(), $this->equalTo(0));
    }
}
 