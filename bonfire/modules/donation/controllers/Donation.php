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
class Donation extends Front_Controller
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
            'url',
            'security',
        ));
        $this->load->library('form_validation');
        $this->load->model('donation/donation_model');
        $this->load->library('users/auth');
        // $this->lang->load('users');
        $this->load->model('roles/role_model');
    }
    
    // -------------------------------------------------------------------------
    // Authentication (Login/Logout)
    // -------------------------------------------------------------------------
    
  /**
   * function used to create donation 
   */
    public function donate()
    {
        /* this function check user login */
        $this->auth->restrict();
        $slug=$this->uri->segment(3);
        if(isset($_POST['save']))
        {
            $this->form_validation->set_rules('amount','Please Enter Amount','required|numeric|greater_than[0.99]');
            if($this->form_validation->run()==true)
            {
               $data_post=array(
                    'user_id'=>$this->auth->user()->id,
                    'campaign_id'=>$this->input->post('campaign_id'),
                    'amount'=>$this->input->post('amount'),
                    'productInfo'=>$this->input->post('campaign_name'),
                   'firstname'=>$this->auth->user()->username,
                    'email'=>$this->auth->user()->email,
                    'udf5'=>'12345',
                    'mihpayid'=>'123',
               );
               $data_post= $this->security->xss_clean($data_post);
                if ($this->donation_model->donate_insert($data_post) == true)
                {
                    $this->load->model('campaign/campaign_model');
                    $this->campaign_model->update_pledge($this->input->post('campaign_id'),$this->input->post('amount'));
                   
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/'.$slug.'');
                }
                else{
                    Template::set_message(lang('us_user_created_error'), 'error');
                    redirect('campaign/'.$slug.'');
                }
            }
            else{
                redirect('campaign/'.$slug.'');
                }
         }
      else{
                redirect('campaign/'.$slug.'');
         }
    }
    
    /**
     * function used to view user by donation
     */
    public function view()
    {
        /* this function check user login */
            $this->auth->restrict();
            $user_id=$this->session->user_id;
            Template::set('donation_list', $this->donation_model->get_by_donation_list($user_id));
            Template::set_view('donation/list');
            Template::render();
    }
    
    /**
     * function used to list donation
     */
    public function lists()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1)
        {
            Template::set('donation_list', $this->donation_model->get_by_donation_list());
            Template::set_view('donation/list');
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
   
}
/* End of file /bonfire/modules/users/controllers/users.php */
