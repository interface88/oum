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
 * @license http://opensource.org/licenses/MIT The MIT License
 * @link http://cibonfire.com
 * @since Version 1.0
 * @filesource
 */

/**
 * Home controller
 *
 * The base controller which displays the homepage of the Bonfire site.
 *
 * @package Bonfire
 * @subpackage Controllers
 * @category Controllers
 * @author Bonfire Dev Team
 * @link http://guides.cibonfire.com/helpers/file_helpers.html
 *      
 */
class Home extends MX_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->helper('application');
        $this->load->library('Template');
        $this->load->library('Assets');
        $this->lang->load('application');
        $this->load->library('events');
        $this->load->library('users/auth');
        $this->set_current_user();
        $this->load->helper(array('text','percentage'));
        $this->load->library('installer_lib');
        if (! $this->installer_lib->is_installed()) {
            $ci = &get_instance();
            $ci->hooks->enabled = false;
            redirect('install');
        }

        // Make the requested page var available, since
        // we're not extending from a Bonfire controller
        // and it's not done for us.
        $this->requested_page = isset($_SESSION['requested_page']) ? $_SESSION['requested_page'] : null;
    }

    // --------------------------------------------------------------------

    /**
     * Displays the homepage of the Bonfire app
     *
     * @return void
     */
    public function index()
    {
        $this->load->model('campaign/campaign_model');
        Template::set('campaign_item', $this->campaign_model->get_front_campaign_by_hit());
        Template::set('feature_item', $this->campaign_model->get_front_campaign_by_feature());
        Template::set('last_campaign_item', $this->campaign_model->get_front_campaign());
        Template::render();
    }
    // end index()
    /**
     * This function used to about us page view
     */
    public function about()
    {   
        Template::set_view('home/aboutus');
        Template::render();
    }
    
/**
 * This function used to campaign page view
 */
    public function campaign()
    {
        $this->load->helper(array(
            'oum_form',
            'url','security',
        ));
        $this->load->library('form_validation');
        
        $slug = $this->uri->segment(2);
        if ($slug == NULL) {
            $this->load->model('campaign/campaign_model');
            $this->load->model('category/category_model');
            $category_item=$this->category_model->get_list();
            $category_list=array();
            $category_list['']= '- select category -';
            foreach($category_item as $row)
            {
                 $category_list[$row->category_name]=$row->category_name;
            }
            Template::set('campaign_item', $this->campaign_model->get_front_campaign());
            Template::set('category_list',$category_list);
            
            Template::set_view('campaign/view_campaign');
            Template::render();
        } else {
            $this->load->helper(array('oum_form','url',));
            $this->load->library('form_validation');
            $this->load->model('campaign/campaign_model');
            $data_campaign = $this->campaign_model->get_by_slug($slug);
            $this->load->model('donation/donation_model');
            $donation_count=$this->donation_model->get_by_campaign_count($data_campaign->campaign_id);
            $recent_campaign=$this->campaign_model->get_campaign_by_category($data_campaign->category);
            if ($data_campaign == null) {
                show_404("/");
            }
            
            /* hit function called */
            $user_id = 0;
            if (! empty($this->auth->user()->id))
            {
                $user_id = $this->auth->user()->id;
            }
            $this->load->model('hits/hits_model');
            $post_hits = array(
                'campaign_id' => $data_campaign->campaign_id,
                'user_id' => $user_id,
                'ip_address' => $this->input->ip_address()
            );
            $this->hits_model->insert_hits($post_hits);
            /* hit function called end */
            Template::set('campaign_item', $data_campaign);
            Template::set('donation_count', $donation_count);
            Template::set('recent_campaign_item', $recent_campaign);
            Template::set_view('campaign/index');
            Template::render();
        }
    }
/**
 * This function used to contact page view
 */
    public function contact_us()
    {
        $this->load->helper(array(
            'oum_form',
            'url','security',
        ));
        $this->load->library('form_validation');
        $this->load->model('contact_us/contact_model');
        if (isset($_POST['send'])) {
            $this->form_validation->set_rules($this->contact_model->get_custom_validation_rules('contact'));
            if ($this->form_validation->run() == true) {
                $data_post = array(
                    'name' => $this->input->post('name', TRUE),
                    'email' => $this->input->post('email', TRUE),
                    'phone' => $this->input->post('phone', TRUE),
                    'subject' => $this->input->post('subject', TRUE),
                    'message' => $this->input->post('message', TRUE)
                );
                $data_post = $this->security->xss_clean($data_post);
                if ($this->contact_model->insert_contact($data_post) == true) {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    Template::render();
                    // redirect('category/lists');
                } else {
                    Template::set_message(lang('us_user_created_unsuccess'), 'error');
                    Template::render();
                }
            } else {
                Template::set_view('contact_us/contact_us');
                Template::render();
            }
        }

        Template::set_view('contact_us/contact_us');
        Template::render();
    }

    // end contact_us()
    // --------------------------------------------------------------------

    /**
     * If the Auth lib is loaded, it will set the current user, since users
     * will never be needed if the Auth library is not loaded.
     * By not requiring
     * this to be executed and loaded for every command, we can speed up calls
     * that don't need users at all, or rely on a different type of auth, like
     * an API or cronjob.
     *
     * Copied from Base_Controller
     */
    protected function set_current_user()
    {
        if (class_exists('Auth')) {
            // Load our current logged in user for convenience
            if ($this->auth->is_logged_in()) {
                $this->current_user = clone $this->auth->user();

                $this->current_user->user_img = gravatar_link($this->current_user->email, 22, $this->current_user->email, "{$this->current_user->email} Profile");

                // if the user has a language setting then use it
                if (isset($this->current_user->language)) {
                    $this->config->set_item('language', $this->current_user->language);
                }
            } else {
                $this->current_user = null;
            }

            // Make the current user available in the views
            if (! class_exists('Template')) {
                $this->load->library('Template');
            }
            Template::set('current_user', $this->current_user);
        }
    }
}
/* end ./application/controllers/home.php */
