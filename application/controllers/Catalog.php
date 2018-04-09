<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Catalog extends Application
{

	/**
	 * Index page.
	 */
	public function index()
	{
		$categories = $this->categories->all();
		foreach ($categories as $category) {
			$accessories = $this->accessories->some('categoryId', $category->categoryId);
			foreach ($accessories as $accessory) {
				$accessory->categoryName = $category->categoryName;
			}
			$category->accessories = $accessories;
		}

        $this->data['categories'] = $categories;
        $this->data['pagebody'] = 'catalog';
		$this->data['pagetitle'] = 'Checkout The Catalog!';
		$this->render();
	}

}
