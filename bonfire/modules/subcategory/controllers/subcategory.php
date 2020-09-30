<?php

defined('BASEPATH') || exit('No direct script access allowed');

/**
 * Bonfire
 *
 * An open source project to allow developers to jumpstart their development of
 * CodeIgniter applications.
 *
 * @package Bonfire
 * @author Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2014, Bonfire Dev Team
 * @license http://opensource.org/licenses/MIT
 * @link http://cibonfire.com
 * @since Version 1.0
 * @filesource
 */

/**
 * Users Controller.
 *
 * Provides front-end functions for users, including access to login and logout.
 *
 * @package Bonfire\Modules\Users\Controllers\Users
 * @author Bonfire Dev Team
 * @link http://cibonfire.com/docs/developer
 */
class subcategory extends Front_Controller
{
    /** @var array Site's settings to be passed to the view. */
    private $siteSettings;
    
    /**
     * Setup the required libraries etc.
     *
     * @retun void
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->helper(array('oum_form','url'));
        $this->load->library('form_validation');
        $this->load->model('subcategory/subcategory_model');
        $this->load->model('category/category_model');
        $this->load->library('users/auth');
        // $this->lang->load('users');
        $this->load->model('roles/role_model');
     }
    
    // -------------------------------------------------------------------------
    // Authentication (Login/Logout)
    // -------------------------------------------------------------------------
    
    /**
     * Present the login view and allow the user to login.
     *
     * @return void
     */
    /*function used to subcreate category*/
     public function create()
     {
      /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) 
        {
            $this->form_validation->set_rules('category', 'Sub Category Name', 'required|trim');
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
             if ($this->form_validation->run() == FALSE)
             {  $data=$this->category_model->get_list();
                   $category_list=array();
                   foreach ($data as $row)
                     {
                         $category_list[$row->category_id]=$row->category_name;
                     }
                    Template::set_view('subcategory/create');
                    Template::set('category_list',$category_list);
                    Template::render();
            } 
            else {
                    if (isset($_POST['save'])) 
                    {
                        $data=array('category_id'=>$this->input->post('category_name'),'sub_category_name' =>$this->input->post('category'));
                        if ($this->subcategory_model->insert_subcategory($data) == true)
                         {
                            Template::set_message(lang('us_user_created_success'), 'success');
                            redirect('subcategory/list');
                         }       
                    }
                  }  
        }
         else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }   
     }
    /*function used to create subcategory end*/
    /*function used to subcreate edit category*/
     public function edit()
     {
      /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) 
        {
            $slug=$this->uri->segment(3);
            $this->form_validation->set_rules('category', 'Sub Category Name', 'required|trim');
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
             if ($this->form_validation->run() == FALSE)
            {
                    $datasub=$this->subcategory_model->get_list($slug);
                    $data=$this->category_model->get_list();
                    $category_list=array();
                    foreach ($data as $row)
                     {
                         $category_list[$row->category_id]=$row->category_name;
                     }
                    Template::set_view('subcategory/edit');
                    Template::set('subcategory_list',$datasub);
                    Template::set('category_list',$category_list);
                    Template::render();
            } 
            else {
                    if (isset($_POST['save'])) 
                    {
                        $data=array('category_id'=>$this->input->post('category_name'),'sub_category_name' =>$this->input->post('category'));
                        if ($this->subcategory_model->update_subcategory($slug,$data) == true)
                         {
                            Template::set_message(lang('us_user_created_success'), 'success');
                            redirect('subcategory/list');
                         }       
                    }
                  }  
        }
         else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }   
     }
         /*function used to subcreate edit category*/
    
    /*function used to list subcategory*/
        public function list()
    {
            /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            Template::set_view('subcategory/list');
            Template::set('subcategory_list', $this->subcategory_model->get_list());
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    /*function used to list subcategory end*/
    /*function used to delete subcategory*/
    public function delete()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1)
        {
            $slug=$this->input->get('id');
            $data=array('is_delete'=>'1');
            $result = $this->subcategory_model->update_subcategory($slug,$data);
            echo $result;
        }
        else
        {
            Template::set_message('Cannot Access this page.', 'error');
            redirect('subcategory/list');
            Template::render();
        }
    }
    /*function used to delete subcategory end*/
}
/* End of file /bonfire/modules/users/controllers/users.php */
