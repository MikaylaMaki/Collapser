<?php
/**
 * Created by IntelliJ IDEA.
 * User: Huulktya
 * Date: 9/28/14
 * Time: 2:48 PM
 */

class SubtractionTest extends PHPUnit_Framework_TestCase {
    /**
     * @var Subtraction
     */
    private $subtraction;

    public function setUp() {
        $this->subtraction = new Subtraction();
    }

    public function tearDown() {
        $this->subtraction = null;
    }

    public function testSubtraction() {
        $this->assertThat($this->subtraction->collapse(2,1), $this->equalTo(1));
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadParams1() {
        $this->subtraction->collapse("ASD", new stdClass());
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadParams2() {
        $this->subtraction->collapse("ASD", 1);
    }

    /**
     * @expectedException InvalidArgumentException
     */
    public function testBadParams3() {
        $this->subtraction->collapse(1, new stdClass());
    }

    public function testBaseCase() {
        $this->assertThat($this->subtraction->getBaseCase(), $this->isType("int"));
        $this->assertThat($this->subtraction->getBaseCase(), $this->equalTo(0));
    }
}