<?php
use PHPUnit\Framework\TestCase;

class AccessoryTest  extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('accessories');
        $this->accessories = new Accessories;
    }

    function testAccessoryId()
    {
        $this->accessories->setId(10);
        $this->assertEquals(10, $this->accessories->accessoryId);
    }

    public function testAccessoryName() {
        $this->accessories->setName("Hello");
        $this->assertEquals("Hello", $this->accessories->accessoryName);
    }

    public function testAccessoryImage() {
        $this->accessories->setAccessoryImage("Bug.png");
        $this->assertEquals("Bug.png", $this->accessories->accessoryImage);
    }

    public function testAccessoryWeight(){
        $this->accessories->setAcessoryWeight(2);
        $this->assertEquals(2, $this->accessories->accessoryWeight);
    }

    public function testAccessoryDamage(){
        $this->accessories->setAccessoryDamage(20);
        $this->assertEquals(20, $this->accessories->accessoryDamage);
    }
}