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
        $this->load->helper(array(
            'oum_form',
            'url'
        ));
        $this->load->library('form_validation');
        $this->load->model('campaign/campaign_model');
        $this->load->model('users/User_model');
        $this->load->library('users/auth');
        // $this->lang->load('users');
        $this->load->model('roles/role_model');
        
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
    public function create()
    {
        /* this function check user login */
        $this->auth->restrict();
        $this->form_validation->set_rules($this->user_model->get_validation_rules('project'));
        $config['upload_path'] = './assets/Campaign/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $this->load->library('upload', $config);
        Template::set('active_tab', 'project');
        if ($this->form_validation->run() == FALSE) 
        {
            $error = array(
                'error' => ''
            );
            Template::set_view('campaign/create');
            Template::render();
        }
         else {
            if (isset($_POST['save'])) {
                if ($this->upload->do_upload('userfile')) 
                {
                    $upload_data = $this->upload->data();
                    $data = array(
                        'user_id' => $this->session->user_id,
                        'title' => $_POST['title'],
                        'slug' => url_title($_POST['title'], 'dash', true),
                        'subtitle' => $_POST['subtitle'],
                        'category' => $_POST['category'],
                        'sub_category'=>$_POST['sub_category'],
                        'target_audience' => $_POST['target_audience'],
                        'description' => $_POST['txtEditor'],
                        'image' => $upload_data['file_name'],
                        'video_url' => $_POST['video_url'],
                        'status' => 'D',
                         );
                    if ($this->campaign_model->insert($data) == true) {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        Template::render();
                        redirect('Campaign/funding');
                    }
                } 
                else {
                    $error = array(
                        'error' => $this->upload->display_errors()
                    );
                    Template::set_view('campaign/create');
                    Template::set('error', $error);
                    Template::render();
                }
            }
        }
    }
    
    /**
     * Function to save campaign fundinge detail
     */
    public function funding()
    {
        /* this function check user login */
        $this->auth->restrict();
        $config['upload_path'] = './assets/Campaign/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $this->load->library('upload', $config);
        
        Template::set('active_tab', 'funding');
        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'error' => ''
            );
            Template::set_view('campaign/new');
            Template::render();
        } else {
            if (isset($_POST['save'])) {
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    //TODO : need to update data only
                    /*
                    $data = array(
                        'user_id' => $this->session->user_id,
                        'title' => $_POST['title'],
                        'slug' => url_title($_POST['title'], 'dash', true),
                        'subtitle' => $_POST['subtitle'],
                        'category' => $_POST['category'],
                        'location' => $_POST['location'],
                        'image' => $upload_data['file_name'],
                        'video_url' => $_POST['video_url'],
                        'description' => $_POST['txtEditor'],
                        'goal' => $_POST['goal'],
                        'launched' => $_POST['launched'],
                        'deadline' => $_POST['fixed_day_value'],
                        'status' => 'D',
                        'is_active' => 1,
                        'created_on' => date("Y-m-d H:i:s"),
                        'created_by' => ''
                    );
                    if ($this->campaign_model->insert($data) == true) {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        Template::render();
                    }
                    */
                } else {
                    $error = array(
                        'error' => $this->upload->display_errors()
                    );
                    Template::set_view('campaign/new');
                    Template::set('error', $error);
                    Template::render();
                }
            }
        }
    }
    
    /**
     * Function to save campaign payment tab
     */
    public function payment()
    {
        /* this function check user login */
        $this->auth->restrict();
        $config['upload_path'] = './assets/Campaign/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $this->load->library('upload', $config);
        
        Template::set('active_tab', 'funding');
        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'error' => ''
            );
            Template::set_view('campaign/new');
            Template::render();
        } else {
            if (isset($_POST['save'])) {
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    //TODO : need to update data only
                    /*
                     $data = array(
                     'user_id' => $this->session->user_id,
                     'title' => $_POST['title'],
                     'slug' => url_title($_POST['title'], 'dash', true),
                     'subtitle' => $_POST['subtitle'],
                     'category' => $_POST['category'],
                     'location' => $_POST['location'],
                     'image' => $upload_data['file_name'],
                     'video_url' => $_POST['video_url'],
                     'description' => $_POST['txtEditor'],
                     'goal' => $_POST['goal'],
                     'launched' => $_POST['launched'],
                     'deadline' => $_POST['fixed_day_value'],
                     'status' => 'D',
                     'is_active' => 1,
                     'created_on' => date("Y-m-d H:i:s"),
                     'created_by' => ''
                     );
                     if ($this->campaign_model->insert($data) == true) {
                     Template::set_message(lang('us_user_created_success'), 'success');
                     Template::render();
                     }
                     */
                } else {
                    $error = array(
                        'error' => $this->upload->display_errors()
                    );
                    Template::set_view('campaign/new');
                    Template::set('error', $error);
                    Template::render();
                }
            }
        }
    }
    
    
    /**
     * Function to save campaign people team tab
     */
    public function people_team()
    {
        /* this function check user login */
        $this->auth->restrict();
        $config['upload_path'] = './assets/Campaign/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $this->load->library('upload', $config);
        
        Template::set('active_tab', 'funding');
        if ($this->form_validation->run() == FALSE) {
            $error = array(
                'error' => ''
            );
            Template::set_view('campaign/new');
            Template::render();
        } else {
            if (isset($_POST['save'])) {
                if ($this->upload->do_upload()) {
                    $upload_data = $this->upload->data();
                    //TODO : need to update data only
                    /*
                     $data = array(
                     'user_id' => $this->session->user_id,
                     'title' => $_POST['title'],
                     'slug' => url_title($_POST['title'], 'dash', true),
                     'subtitle' => $_POST['subtitle'],
                     'category' => $_POST['category'],
                     'location' => $_POST['location'],
                     'image' => $upload_data['file_name'],
                     'video_url' => $_POST['video_url'],
                     'description' => $_POST['txtEditor'],
                     'goal' => $_POST['goal'],
                     'launched' => $_POST['launched'],
                     'deadline' => $_POST['fixed_day_value'],
                     'status' => 'D',
                     'is_active' => 1,
                     'created_on' => date("Y-m-d H:i:s"),
                     'created_by' => ''
                     );
                     if ($this->campaign_model->insert($data) == true) {
                     Template::set_message(lang('us_user_created_success'), 'success');
                     Template::render();
                     }
                     */
                } else {
                    $error = array(
                        'error' => $this->upload->display_errors()
                    );
                    Template::set_view('campaign/new');
                    Template::set('error', $error);
                    Template::render();
                }
            }
        }
    }
    
    
    public function edit()
    {
        
        /* this function check user login */
        $this->auth->restrict();
        $slug = $this->uri->segment(3);
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('subtitle', 'Sub Title', 'required|trim');
        $this->form_validation->set_rules('category', 'Category', 'required|trim');
        $this->form_validation->set_rules('txtEditor', 'Description', 'required|trim');
        $this->form_validation->set_rules('launched', 'Target launch date', 'required|trim');
        $this->form_validation->set_rules('fixed_day_value', 'Campaign duration', 'required|trim');
        $this->form_validation->set_rules('goal', 'Target Amount', 'required|trim');
        $config['upload_path'] = './assets/Campaign/';
        $config['allowed_types'] = 'gif|jpeg|jpg|png';
        $this->load->library('upload', $config);
        if ($this->form_validation->run() == FALSE) {
            $data = $this->campaign_model->user_id_data_fetch($slug);
            $error = array(
                'error' => ''
            );
            Template::set_view('campaign/edit');
            Template::set('list_item', $data);
            Template::set('error', $error);
            Template::render();
        } else {
            if (isset($_POST['save'])) {
                if ($this->upload->do_upload('userfile')) {
                    $upload_data = $this->upload->data();
                    $data = array(
                        'user_id' => $this->session->user_id,
                        'title' => $_POST['title'],
                        'slug' => url_title($_POST['title'], 'dash', true),
                        'subtitle' => $_POST['subtitle'],
                        'category' => $_POST['category'],
                        'location' => $_POST['location'],
                        'image' => $upload_data['file_name'],
                        'video_url' => $_POST['video_url'],
                        'description' => $_POST['txtEditor'],
                        'goal' => $_POST['goal'],
                        'launched' => $_POST['launched'],
                        'deadline' => $_POST['fixed_day_value'],
                        'status' => 'D',
                        'is_active' => 1,
                        'created_on' => date("Y-m-d H:i:s"),
                        'created_by' => ''
                    );
                    if ($this->campaign_model->update_campaign($slug, $data) == true) {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        redirect('Campaign/views');
                    }
                } else {
                    $error = array(
                        'error' => $this->upload->display_errors()
                    );
                    Template::set_view('campaign/Edit/' . $slug . '');
                    Template::set('error', $error);
                    Template::render();
                }
            }
        }
    }
    
    /* this function used to user_id to fetch data by the user wise the data */
    public function view()
    {
        /* this function check user login */
        $this->auth->restrict();
        $slug = $this->uri->segment(3);
        $data = $this->campaign_model->user_id_data_fetch($slug);
        Template::set_view('campaign/view');
        Template::set('list_item', $data);
        Template::render();
    }
    
    public function view_top_limit()
    {}
    
    public function views()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->uri->segment(3);
            
            $data = $this->campaign_model->get_view_all($slug);
            Template::set_view('campaign/admin_view');
            Template::set('list_item', $data);
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    
    /* function used to status changes */
    public function status_change()
    {
        $id = $this->input->get('id');
        $data = array(
            'status' => $this->input->get('status')
        );
        $result = $this->campaign_model->campaign_status($id, $data);
        echo $result;
    }
    
    /* function used to status changes */
    public function active()
    {
        $id = $this->input->get('id');
        $data = array(
            'is_active' => $this->input->get('status')
        );
        $result = $this->campaign_model->campaign_status($id, $data);
        echo $result;
    }
    
    /* function used to status changes */
    public function delete()
    {
        $id = $this->input->get('id');
        $data = array(
            'deleted' => 1
        );
        $result = $this->campaign_model->campaign_status($id, $data);
        echo $result;
    }

    /*function used to create category*/
     public function category()
     {
      /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) 
        {
            $this->form_validation->set_rules('category', 'Category', 'required|trim');
             if ($this->form_validation->run() == FALSE)
            {
                    Template::set_view('campaign/create_category');
                    Template::render();
            } 
            else {
                    if (isset($_POST['save'])) 
                    {
                        $data=array('category_name' =>$_POST['category'],);
                        if ($this->campaign_model->insert_category($data) == true)
                         {
                            Template::set_message(lang('us_user_created_success'), 'success');
                            redirect('Campaign/view_cateogry');
                         }       
                    }
                  }  
        }
         else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }   
     }
    /*function used to create category end*/
    /*function used to edit category*/
     public function edit_category()
     {
      /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) 
        {
            $this->form_validation->set_rules('category', 'Category Name', 'required|trim');
             if ($this->form_validation->run() == FALSE)
            {
                    $slug=$this->uri->segment(3);
                    $data=$this->campaign_model->get_view_category($slug);
                    Template::set_view('campaign/edit_category');
                    Template::set('list_item',$data);
                    Template::render();
            } 
            else {
                    if (isset($_POST['save'])) 
                    {
                        $data=array('category_name' =>$_POST['category']);
                        if ($this->campaign_model->update_category($slug,$data) == true)
                         {
                            Template::set_message(lang('us_user_created_success'), 'success');
                            redirect('Campaign/view_cateogry');
                         }       
                    }
                  }  
        }
         else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }   
     }
    /*function used to edit category*/
    /*function used to subcreate category*/
     public function subcategory()
     {
      /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) 
        {
            $this->form_validation->set_rules('category', 'Sub Category Name', 'required|trim');
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
             if ($this->form_validation->run() == FALSE)
            {
                    $data=$this->campaign_model->get_view_category();
                    $category_item=array();
                    foreach ($data as $row)
                     {
                         $category_item[$row->category_id]=$row->category_name;
                     }
                    Template::set_view('campaign/create_subcategory');
                    Template::set('category_item',$category_item);
                    Template::render();
            } 
            else {
                    if (isset($_POST['save'])) 
                    {
                        $data=array('subcategory_name' =>$_POST['category'],'category_id'=>$_POST['category_name']);
                        if ($this->campaign_model->insert_subcategory($data) == true)
                         {
                            Template::set_message(lang('us_user_created_success'), 'success');
                            redirect('Campaign/view_subcateogry');
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
     public function edit_subcategory()
     {
      /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) 
        {
            $this->form_validation->set_rules('category', 'Sub Category Name', 'required|trim');
            $this->form_validation->set_rules('category_name', 'Category Name', 'required|trim');
             if ($this->form_validation->run() == FALSE)
            {
                    $slug=$this->uri->segment(3);
                    $datasub=$this->campaign_model->get_view_subcategory($slug);
                    $data=$this->campaign_model->get_view_category();
                    $category_item=array();
                    foreach ($data as $row)
                     {
                         $category_item[$row->category_id]=$row->category_name;
                     }
                    Template::set_view('campaign/edit_subcategory');
                    Template::set('list_item',$datasub);
                    Template::set('category_item',$category_item);
                    Template::render();
            } 
            else {
                    if (isset($_POST['save'])) 
                    {
                        $data=array('subcategory_name' =>$_POST['category'],'category_id'=>$_POST['category_name']);
                        if ($this->campaign_model->update_subcategory($slug,$data) == true)
                         {
                            Template::set_message(lang('us_user_created_success'), 'success');
                            redirect('Campaign/view_cateogry');
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
    /*function used to view category*/
        public function category_view()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->uri->segment(3);
            
            $data = $this->campaign_model->get_view_category($slug);
            Template::set_view('campaign/view_cateogry');
            Template::set('list_item', $data);
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    /*function used to view category end*/
    /*function used to view subcategory*/
        public function sub_category_view()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->uri->segment(3);

            $data = $this->campaign_model->get_view_subcategory($slug);
            
            Template::set_view('campaign/view_subcategory');
            Template::set('list_item', $data);
            Template::render();
        } else {
            Template::set_message('Cannot Access this page.', 'error');
            Template::render();
        }
    }
    /*function used to view subcategory end*/
}

/* End of file /bonfire/modules/users/controllers/users.php */
