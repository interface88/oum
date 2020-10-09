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
class Category extends Front_Controller
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
        $this->load->helper(array(
            'oum_form',
            'url'
        ));
        $this->load->library('form_validation');
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
    /* function used to create category */
    public function create()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $this->form_validation->set_rules('category', 'Category', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                Template::set_view('category/create');
                Template::render();
            } else {
                if (isset($_POST['save'])) {
                    $data = array(
                        'category_name' =>$this->input->post('category')
                    );
                    if ($this->category_model->insert_category($data) == true)
                    {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        redirect('category/lists');
                    }
                }
            }
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to create category end */
    /* function used to edit category */
    public function edit()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->uri->segment(3);
            if (isset($_POST['save'])) {
                $this->form_validation->set_rules('category', 'Category Name', 'required|trim');
                if ($this->form_validation->run() == FALSE) {
                    $category_list = $this->category_model->get_list($slug);
                    Template::set_view('category/edit');
                    Template::set('category_list', $category_list);
                    Template::render();
                } else {
                    $data = array(
                        'category_name' =>$this->input->post('category'),
                    );
                    if ($this->category_model->update_category($slug, $data) == true) {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        redirect('category/lists');
                    }
                }
            }
            else{
                $category_list = $this->category_model->get_list($slug);
                if ($category_list == null) {
                    show_404("/");
                }
                Template::set_view('category/edit');
                Template::set('category_list', $category_list);
                Template::render();
            }
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to edit category */
    /* function used to list category */
    public function lists()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1)
        {
            $category_list = $this->category_model->get_list();
            Template::set_view('category/list');
            Template::set('category_list', $category_list);
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to list category end */
    /* function used to delete category */
    public function delete()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->input->get('id');
            $data = array(
                'is_delete' => '1'
            );
            $result = $this->category_model->update_category($slug, $data);
            echo $result;
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            redirect('category/lists');
            Template::render();
        }
    }
    
    /* function used to delete category end */
}
/* End of file /bonfire/modules/users/controllers/users.php */
