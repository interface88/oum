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
class Contact_us extends Front_Controller
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
        $this->load->helper(array('oum_form','url','text'));
        $this->load->library('form_validation');
        $this->load->library('users/auth');
        $this->load->model('contact_us/contact_model');
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
    /* function used to list contact_us */
    public function lists()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1)
        {
            Template::set_view('contact_us/list');
            Template::set('contact_list', $this->contact_model->get_list());
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to list category end */
    /* function used to delete contact_us */
    public function delete()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->input->get('id');
            $data = array(
                'is_delete' => '1'
            );
            $result = $this->contact_model->update_contact($slug, $data);
            echo $result;
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            redirect('category/lists');
            Template::render();
        }
    }
    /* function used to delete contact_us end */
      
}
/* End of file /bonfire/modules/users/controllers/users.php */
