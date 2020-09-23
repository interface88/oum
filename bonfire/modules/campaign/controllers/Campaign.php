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
        $this->load->helper(array('form', 'url'));
        $this->load->library('form_validation');
        $this->load->model('campaign/Campaign_model');
        $this->load->model('users/User_model');
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
        $this->form_validation->set_rules('subtitle','Sub Title','required|trim');
        $this->form_validation->set_rules('category','Category','required|trim');
        $this->form_validation->set_rules('txtEditor','Description','required|trim');
        $this->form_validation->set_rules('launched','Target launch date','required|trim');
        $this->form_validation->set_rules('fixed_day_value','Campaign duration','required|trim');  
        $this->form_validation->set_rules('goal','Target Amount','required|trim');  
         $config['upload_path']          = './assets/Campaign/';
         $config['allowed_types']        = 'gif|jpeg|jpg|png';
         $this->load->library('upload', $config);
         if($this->form_validation->run()==FALSE)
            {
                    $error=array('error' =>'');
                    Template::set_view('campaign/new');        
                    Template::render();
            }
            else{
                    if (isset($_POST['save']))
                    {
                        if($this->upload->do_upload())
                        {
                            $upload_data=$this->upload->data();
                            $data=array(
                                            'user_id'=>'4',
                                            'title'=>$_POST['title'],
                                            'slug'=>url_title($_POST['title'], 'dash', true),
                                            'subtitle'=>$_POST['subtitle'],
                                            'category'=>$_POST['category'],
                                            'location'=>$_POST['location'],
                                            'image'=>$upload_data['file_name'],
                                            'video_url'=>$_POST['video_url'],
                                            'description'=>$_POST['txtEditor'],
                                            'goal'=>$_POST['goal'],
                                            'launched'=>$_POST['launched'],
                                            'deadline'=>$_POST['fixed_day_value'],
                                            'status'=>'D',
                                            'is_active'=>1,
                                            'created_on'=>date("Y-m-d H:i:s"),
                                            'created_by'=>''
                                        );
                            if($this->Campaign_model->insert($data)==true)
                            {
                                Template::set_message(lang('us_user_created_success'), 'success');
                                Template::render();
                                redirect('Campaign/views');
                   
                            }   
                        }  
                        else
                        {
                            $error = array('error' => $this->upload->display_errors());
                            Template::set_view('campaign/new');        
                            Template::set('error', $error);
                            Template::render();
        
                        }
                    
                    }
                }
            
     }
     public function Edit()
     {
        $slug=$this->uri->segment(3); 
        $this->form_validation->set_rules('title','Title','required|trim');
        $this->form_validation->set_rules('subtitle','Sub Title','required|trim');
        $this->form_validation->set_rules('category','Category','required|trim');
        $this->form_validation->set_rules('txtEditor','Description','required|trim');
        $this->form_validation->set_rules('launched','Target launch date','required|trim');
        $this->form_validation->set_rules('fixed_day_value','Campaign duration','required|trim');  
        $this->form_validation->set_rules('goal','Target Amount','required|trim');  
         $config['upload_path']          = './assets/Campaign/';
         $config['allowed_types']        = 'gif|jpeg|jpg|png';
         $this->load->library('upload', $config);  
         if($this->form_validation->run()==FALSE)
            {
                $data=$this->Campaign_model->get_view($slug);
                $error=array('error' =>'');
                Template::set_view('campaign/edit');
                Template::set('list_item', $data);
                Template::set('error', $error);
                Template::render();          
            }
            else{
                    if (isset($_POST['save']))
                    {
                       if($this->upload->do_upload('userfile'))
                        {
                            $upload_data=$this->upload->data();
                            $data=array(
                                        'user_id'=>'4',
                                        'title'=>$_POST['title'],
                                        'slug'=>url_title($_POST['title'], 'dash', true),
                                        'subtitle'=>$_POST['subtitle'],
                                        'category'=>$_POST['category'],
                                        'location'=>$_POST['location'],
                                        'image'=>$upload_data['file_name'],
                                        'video_url'=>$_POST['video_url'],
                                        'description'=>$_POST['txtEditor'],
                                        'goal'=>$_POST['goal'],
                                        'launched'=>$_POST['launched'],
                                        'deadline'=>$_POST['fixed_day_value'],
                                        'status'=>'D',
                                        'is_active'=>1,
                                        'created_on'=>date("Y-m-d H:i:s"),
                                        'created_by'=>''
                                    );
                                if($this->Campaign_model->update_campaign($slug,$data)==true)
                                {
                                    Template::set_message(lang('us_user_created_success'), 'success');
                                    redirect('Campaign/views');
                                }   
                        }
                        else
                        {
                            $error = array('error' => $this->upload->display_errors());
                            Template::set_view('campaign/Edit/'.$slug.'');        
                            Template::set('error', $error);
                            Template::render();
                        }
                    }
                }
     } 
     public function  views()
     {
        $data=$this->Campaign_model->get_view();
        Template::set_view('campaign/view');
        Template::set('list_item', $data);
        Template::render();        
     }
    
     public function view()
    {
        $slug=$this->uri->segment(3);
        $data=$this->Campaign_model->get_views($slug);
        Template::set_view('campaign/index');
        Template::set('campaign_item', $data);
        Template::render();        

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
      
  //      Template::set_view('campaign/index');
        //Template::set('contexts', Contexts::getContexts(true));
        //Template::set('role', $role);
      //  Template::set('toolbar_title', isset($role->role_name) ? "{$title}: {$role->role_name}" : $title);
        
//        Template::render();
    }
}
/* End of file /bonfire/modules/users/controllers/users.php */
