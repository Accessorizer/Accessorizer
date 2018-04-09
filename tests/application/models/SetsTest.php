<?php
use PHPUnit\Framework\TestCase;

class SetsTest  extends TestCase {

    function setUp() {
        $this->CI = &get_instance();
        $this->CI->load->model('categories');
        $this->categories = new Categories;
    }

    function testCategoryId()
    {
        $this->categories->setCategoryId(10);
        $this->assertEquals(10, $this->categories->categoryId);

    }

    public function testCategoryName() {
        $this->categories->setCategoryName("Hello");
        $this->assertEquals("Hello", $this->categories->categoryName);
    }

    public function testCategoryDescription() {
        $this->categories->setCategoryDescription("Testing 123 123");
        $this->assertEquals("Testing 123 123", $this->categories->description);
    }

    public function testCategoryAccessories(){
        $this->categories->setCategoryAccessories([1, 2, 3, 4]);
        $this->assertEquals([1, 2, 3, 4], $this->categories->accessories);
    }
}