<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Set extends Application
{

    /**
     * Index page.
     */
    public function index()
    {
        $set = $this->sets->create();
        $this->session->set_userdata('set', $set);

        $categories = $this->categories->all();
        foreach ($categories as $category) {
            $accessories = $this->accessories->some('categoryId', $category->categoryId);
            foreach ($accessories as $accessory) {
                $accessory->categoryName = $category->categoryName;
            }
            $category->accessories = $accessories;
        }

        $sets = $this->sets->all();

        $this->data['categories'] = $categories;
        $this->data['sets'] = $sets;
        $this->data['pagebody'] = 'set';
        $this->data['pagetitle'] = 'Accessorize Soldier!';
        $this->render();
        
    }

    public function save($id = null) {

        if ($id == null) {
     
            $this->new_set();
        }

        $set = $this->sets->get($id);

        $this->session->set_userdata('set', $set);
        $task = $this->session->userdata('set');

         // setup for validation
        $this->load->library('form_validation');
        $this->form_validation->set_rules($this->sets->rules());

        // retrieve & update data transfer buffer
        $set = (array) $this->session->userdata('set');
        $set = array_merge($set, $this->input->post());
        $set = (object) $set;  // convert back to object
        $this->session->set_userdata('set', (object) $set);

        $this->sets->update($set);
        
        redirect($_SERVER['HTTP_REFERER']);
        
        
    }

    private function new_set() {
        /* New Set ----------------------------*/
        $set = (array) $this->session->userdata('set');
        $set = array_merge($set, $this->input->post());

        $set = (object) $set;
        $this->session->set_userdata('set', (object) $set);

        if (!empty($set->name)) {            
            if (!empty($set->weapon)) {
                $set->weapon = $this->accessories->some('accessoryName', $set->weapon)[0]->accessoryId;
            }

            if (!empty($set->head)) {
                $set->head = $this->accessories->some('accessoryName', $set->head)[0]->accessoryId;
            }
    
            if (!empty($set->chest)) {
                $set->chest = $this->accessories->some('accessoryName', $set->chest)[0]->accessoryId;
            }
    
            if (!empty($set->accessory)) {
                $set->accessory = $this->accessories->some('accessoryName', $set->accessory)[0]->accessoryId;
            }

            if (empty($set->id)) {
                $set->id = $this->sets->highest() + 1;
            }
            
            $this->sets->add($set);
            
        }

        redirect($_SERVER['HTTP_REFERER']);
    }

}