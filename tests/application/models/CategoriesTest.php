<?php
use PHPUnit\Framework\TestCase;

class CategoriesTest  extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('categories');
        $this->categories = new Categories;
    }

    function testCategoryId()
    {
        $this->categories->setCategoryId(10);
        $this->assertEquals(10, $this->categories->categoryId);
        $this->expectException(Exception::class);
        $this->categories->setcategoriesName("!@#$%^&*()");
    }

    public function testCategoryName() {
        $this->categories->setSize(1);
        $this->assertEquals(1, $this->categories->getSize());
        $this->expectException(Exception::class);
        $this->categories->setSize("Am I here?");
    }

    public function testCategoryDescription() {
        $this->categories->setGroup(2);
        $this->assertEquals(2, $this->categories->getGroup());
        $this->expectException(Exception::class);
        $this->categories->setGroup(8675309);
    }

    public function testCategoryAccessories(){
        $this->categories->setPriority(3);
        $this->assertEquals(3, $this->categories->getPriority());
        $this->expectException(Exception::class);
        $this->categories->setPriority(-42);

    }

}