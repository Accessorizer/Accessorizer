<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Create extends Application
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
        $this->data['pagebody'] = 'create';
		$this->data['pagetitle'] = 'Create A Set!';
		$this->render();
	}

}
