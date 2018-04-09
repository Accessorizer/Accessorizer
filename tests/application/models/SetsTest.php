<?php
use PHPUnit\Framework\TestCase;

class SetsTest  extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('sets');
        $this->sets = new Sets;
    }

    function testSetId()
    {
        $this->sets->setId(10);
        $this->assertEquals(10, $this->sets->id);

    }

    public function testSetName() {
        $this->sets->setName("Hello");
        $this->assertEquals("Hello", $this->sets->name);
    }

    public function testSetWeapon() {
        $this->sets->setWeapon(1);
        $this->assertEquals(1, $this->sets->weapon);
    }

    public function testSetHead(){
        $this->sets->setHead(2);
        $this->assertEquals(2, $this->sets->head);
    }

    public function testSetChest(){
        $this->sets->setChest(3);
        $this->assertEquals(3, $this->sets->chest);
    }

    public function testSetAccessory(){
        $this->sets->setAccessory(4);
        $this->assertEquals(4, $this->sets->accessory);
    }
}