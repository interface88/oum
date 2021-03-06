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
class Particulars extends Front_Controller
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
        $this->load->model('particulars/particulars_model');
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
    /* function used to create particulars */
    public function create()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $this->form_validation->set_rules('title', 'Title', 'required|trim');
            $this->form_validation->set_rules('percentage', 'Percentage', 'required|trim');
            if ($this->form_validation->run() == FALSE) {
                Template::set_view('particulars/create');
                Template::render();
            } else {
                if (isset($_POST['save'])) {
                    $data = array(
                        'particular' =>$this->input->post('title'),
                        'particular_value' =>$this->input->post('percentage'),
                    );
                    if ($this->particulars_model->insert_particulars($data) == true)
                    {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        redirect('particulars/lists');
                    }
                }
            }
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to create particulars end */
    /* function used to edit particulars */
    public function edit()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->uri->segment(3);
            if (isset($_POST['save'])) {
                $this->form_validation->set_rules('title', 'Title', 'required|trim');
                $this->form_validation->set_rules('percentage', 'Percentage', 'required|trim');
                if ($this->form_validation->run() == FALSE) {
                    $particulars_list = $this->particulars_model->get_list($slug);
                    Template::set_view('particulars/edit');
                    Template::set('particulars_list', $particulars_list);
                    Template::render();
                } else {
                    $data = array(
                        'particular' =>$this->input->post('title'),
                        'particular_value' =>$this->input->post('percentage'),
                    );
                    if ($this->particulars_model->update_particulars($slug, $data) == true) {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        redirect('particulars/lists');
                    }
                }
            }
            else{
                $particulars_list = $this->particulars_model->get_list($slug);
                if ($particulars_list == null) {
                    show_404("/");
                }
                Template::set_view('particulars/edit');
                Template::set('particulars_list', $particulars_list);
                Template::render();
            }
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to edit particulars */
    /* function used to list particulars */
    public function lists()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1)
        {
            $particulars_list = $this->particulars_model->get_list();
            Template::set_view('particulars/list');
            Template::set('particulars_list', $particulars_list);
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to list particulars end */
    /* function used to particulars category */
    public function delete()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->input->get('id');
            $data = array(
                'deleted' => '1'
            );
            $result = $this->particulars_model->update_particulars($slug, $data);
            echo $result;
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            redirect('particulars/lists');
            Template::render();
        }
    }
    
    /* function used to delete particulars end */
}
/* End of file /bonfire/modules/users/controllers/users.php */
