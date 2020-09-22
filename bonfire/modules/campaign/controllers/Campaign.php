<?php defined('BASEPATH') || exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers to jumpstart their development of
 * CodeIgniter applications.
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2014, Bonfire Dev Team
 * @license   http://opensource.org/licenses/MIT
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

/**
 * Users Controller.
 *
 * Provides front-end functions for users, including access to login and logout.
 *
 * @package Bonfire\Modules\Users\Controllers\Users
 * @author     Bonfire Dev Team
 * @link    http://cibonfire.com/docs/developer
 */
class Campaign extends Front_Controller
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
        $this->load->helper('form');
        $this->load->library('form_validation');
        $this->load->model('users/user_model');
        $this->load->library('users/auth');
        //  $this->lang->load('users');
        $this->siteSettings = $this->settings_lib->find_all();
        if ($this->siteSettings['auth.password_show_labels'] == 1) {
            Assets::add_module_js('users', 'password_strength.js');
            Assets::add_module_js('users', 'jquery.strength.js');
        }
    }

    // -------------------------------------------------------------------------
    // Authentication (Login/Logout)
    // -------------------------------------------------------------------------

    /**
     * Present the login view and allow the user to login.
     *
     * @return void
     */
     public function new()
     {
        $this->form_validation->set_rules('title','Title','required|trim');
        if($this->form_validation->run()===FALSE)
        {
            Template::set_view('campaign/new');        
            Template::render();
        }
        else{
                $_POST['title'];
           }
     } 
   
     public function view()
    {
        /*
        $this->auth->restrict($this->permissionEdit);
        
        $id = (int) $this->uri->segment(5);
        if (empty($id)) {
            Template::set_message(lang('role_invalid_id'), 'error');
            redirect(SITE_AREA . '/settings/roles');
        }
        
        if (isset($_POST['save'])) {
            if ($this->saveRole('update', $id)) {
                Template::set_message(lang('role_edit_success'), 'success');
                redirect(SITE_AREA . '/settings/roles');
            }
             if (! empty($this->role_model->error)) {
                Template::set_message(lang('role_edit_error') . $this->role_model->error, 'error');
            }
        } elseif (isset($_POST['delete'])) {
            if ($this->role_model->delete($id)) {
                Template::set_message(lang('role_delete_success'), 'success');
                redirect(SITE_AREA . '/settings/roles');
            }
            if (! empty($this->role_model->error)) {
                Template::set_message(lang('role_delete_error') . $this->role_model->error, 'error');
            }
        }
        
        if (! class_exists('Contexts', false)) {
            $this->load->library('ui/contexts');
        }
        
        $title = lang('bf_action_edit') . ' ' . lang('matrix_role');
        $role = $this->role_model->find($id);
        */
        Template::set_view('campaign/index');
        //Template::set('contexts', Contexts::getContexts(true));
        //Template::set('role', $role);
      //  Template::set('toolbar_title', isset($role->role_name) ? "{$title}: {$role->role_name}" : $title);
        
        Template::render();
    }
}
/* End of file /bonfire/modules/users/controllers/users.php */
