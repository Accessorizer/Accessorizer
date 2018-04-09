<?php

class Categories extends CSV_Model
{
    // category Id
    public $categoryId;
    // category name
    public $categoryName;
    // category description
    public $description;
    // list of accessories
    public $accessories;

    /**
     * Contructor for Categories
     */
    function __construct()
    {
        parent::__construct(APPPATH . "../data/Categories.csv", "categoryId", "categories");
    }

    function setCategoryId($id)
    {
        if (!is_int($id)) {
            throw new Exception("Must be a number");
        }

        if ($id < 0) {
            throw new Exception("Id must be positive");
        }

        $this->categoryId = $id;
    }

    function setCategoryName($name)
    {
        $this->categoryName = $name;
    }

    function setCategoryDescription($description)
    {
        $this->description = $description;
    }

    function setCategoryAccessories($accessories)
    {
        $this->accessories = $accessories;
    }
}
