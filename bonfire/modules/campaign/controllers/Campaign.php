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
        $this->load->helper(array('oum_form','url'));
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
        Template::set('active_tab', 'project');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->campaign_model->get_custom_validation_rules('project'));
            $config['upload_path'] = './assets/campaign/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $this->load->library('upload', $config);
            // checking validation
            if (empty($_FILES['image']['name']))
            {
                $this->form_validation->set_rules('image', 'Image', 'required');
            }
            if ($this->form_validation->run() == FALSE)
            {
                $error = array('error' => $this->upload->display_errors());
            }
            else{
                if ($this->upload->do_upload('image'))
                {
                    $upload_data = $this->upload->data();
                    $data = array(
                        'user_id' => $this->session->user_id,
                        'title' =>$this->input->post('title'),
                        'slug' => url_title($_POST['title'], 'dash', true),
                        'subtitle' =>$this->input->post('subtitle'),
                        'category' =>$this->input->post('category'),
                        'sub_category'=>$this->input->post('sub_category'),
                        'target_audience' =>$this->input->post('target_audience'),
                        'description' =>$this->input->post('description'),
                        'image' => $upload_data['file_name'],
                        'video_url' =>$this->input->post('video_url'),
                        'status' => 'D',
                    );
                    if ($this->campaign_model->insert($data) == true)
                    {
                        $id=$this->db->insert_id();
                        Template::set_message(lang('us_user_created_success'), 'success');
                        redirect('campaign/funding/'.$id.'');
                    }
                }
            }
        }
        $this->load->model('category/category_model');
        $data_category_fetch=$this->category_model->get_list();
        $category_list=array();
        $category_list['']= '- select category -';
       foreach ($data_category_fetch as $row)
        {
            $category_list[$row->category_name]=$row->category_name;
          //  $category_list[0]='--select--';
        }
        
        Template::set('category_list',$category_list);
        Template::set('subcategory_list',array(''=>'--Select--'));
        Template::set_view('campaign/create');
        Template::render();
    }
    
    /**
     * Function to save campaign fundinge detail
     */
    public function funding()
    {
        $slug=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'funding');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->campaign_model->get_custom_validation_rules('funding'));
            if ($this->form_validation->run() == FALSE)
            {
                $this->load->model('particulars/particulars_model');
                $particulars_list=$this->particulars_model->get_list();
                Template::set_view('campaign/create');
                Template::render();
            }
            else{
                $final_deadline = null;
                $data_info_day_datetime=array();
                if('DAY'==$this->input->post('deadline_selecter'))
                {
                    $data_post=array('deadline_day' =>$this->input->post('deadline_day'));
                    array_push($data_info_day_datetime,$data_post);
                    $final_deadline=date('Y-m-d h:i:s', strtotime("+".$this->input->post('deadline_day')."days"));
                }
                elseif('DATE_TIME'==$this->input->post('deadline_selecter'))
                {
                    $data_post=array('deadline' =>$this->input->post('deadline_date').' '.$this->input->post('deadline_time').':00');
                    array_push($data_info_day_datetime,$data_post);
                    $final_deadline=$this->input->post('deadline_date').' '.$this->input->post('deadline_time').':00';
                }
                $data_post = array(
                    'final_deadline_type' =>$this->input->post('deadline_selecter'),
                    'final_deadline'=>$final_deadline,
                    '80G_availablity' =>$this->input->post('80G_availablity'),
                    'goal'=>$this->input->post('goal'),
                    'final_goal' =>$this->input->post('final_goal'),
                );
                $data=array_merge($data_post,$data_info_day_datetime[0]);
                if ($this->campaign_model->update_campaign($slug,$data) == true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/people_team/'.$slug.'');
                }
                
            }
        }
        $this->load->model('particulars/particulars_model');
        $particulars_list=$this->particulars_model->get_list();
        Template::set('particulars_list',$particulars_list);
   
        Template::set_view('campaign/create');
        Template::render();
    }
    
    
    /**
     * Function to save campaign people team tab
     */
    public function people_team()
    {
        $this->load->model('people_team_model');
        $slug=$this->uri->segment(3);
        
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'people_team');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->people_team_model->get_custom_validation_rules('people_team'));
            //aadhar config
            $config_adhaar['upload_path'] = './assets/adhaarcard/';
            $config_adhaar['allowed_types'] = 'gif|jpeg|jpg|png';
            //pan config
            $config_pan['upload_path'] = './assets/pancard/';
            $config_pan['allowed_types'] = 'gif|jpeg|jpg|png';
            $this->load->library('upload', $config_adhaar ,'adhaar');
            $this->load->library('upload', $config_pan,'pan');
            
            if (empty($_FILES['adhaarcard']['name']))
            {
                $this->form_validation->set_rules('adhaarcard', 'Adhaar card', 'required');
            }
            if (empty($_FILES['pancard']['name']))
            {
                $this->form_validation->set_rules('pancard', 'Pan card', 'required');
            }
            
            if ($this->form_validation->run() == FALSE)
            {
                $error = array(
                                'error' => $this->adhaar->display_errors(),
                                'error' => $this->pan->display_errors(),
                                );
                Template::set('active_tab', 'people_team');
                Template::set_view('campaign/create');
                Template::render();
             }
            else{
                $upload_adhaardata=array();
                if ($this->adhaar->do_upload('adhaarcard'))
                {
                    $upload_adhaardata = $this->adhaar->data();
                }
                $upload_pandata=array();
                if ($this->pan->do_upload('pancard'))
                {
                    $upload_pandata = $this->pan->data();
                }
                $data = array(
                    'campaign_id' => $this->uri->segment(3),
                    'name' =>$this->input->post('name'),
                    'education' =>$this->input->post('education'),
                    'email_id' =>$this->input->post('email_id'),
                    'phone_number' =>$this->input->post('phone_number'),
                    'facebook_profile_link'=>$this->input->post('facebook_profile_link'),
                    'linkedin_profile_link' =>$this->input->post('linkedin_profile_link'),
                    'twitter_profile_link' =>$this->input->post('twitter_profile_link'),
                    'adhaar_card_img' => $upload_adhaardata['file_name'],
                    'pan_card_img' => $upload_pandata['file_name'],
                );
                
                $campaign_id=$this->uri->segment(3);
                $data_update=array('user_company_type'=>'user_tab',);
                $this->campaign_model->update_campaign($campaign_id,$data_update);
                
                if ($this->people_team_model->people_insert($data) == true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/payment/'.$slug.'');
                }
            }
        }
        Template::set_view('campaign/create');
        Template::render();
    }
    /**
     * funtion to save campaign company tab
     */
    public function company()
    {
        $this->load->model('company_model');
        $slug=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'people_team');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->company_model->get_custom_validation_rules('company'));
            //cin config
            $config_cin['upload_path'] = './assets/cin/';
            $config_cin['allowed_types'] = 'gif|jpeg|jpg|png';
            //pan config
            //pan config
            $config_pan['upload_path'] = './assets/companypan/';
            $config_pan['allowed_types'] = 'gif|jpeg|jpg|png';
            
            $this->load->library('upload', $config_cin ,'cin_obj');
            $this->load->library('upload', $config_pan,'pan_obj');
            if (empty($_FILES['cin_img']['name']))
            {
                $this->form_validation->set_rules('cin_img', 'CIN', 'required');
            }
            if (empty($_FILES['pan_img']['name']))
            {
                $this->form_validation->set_rules('pan_img', 'CIN', 'required');
            }
            if($this->form_validation->run() == FALSE)
            {
                $error = array(
                    'error' =>$this->cin_obj->display_errors(),
                    'error' =>$this->pan_obj->display_errors(),
                     );
                Template::set_view('campaign/create');
                Template::render();
             }
            else{
                $upload_cin=array();
                if ($this->cin_obj->do_upload('cin_img'))
                {
                    $upload_cin = $this->cin_obj->data();
                }
                $upload_pandata=array();
                if ($this->pan_obj->do_upload('pan_img'))
                {
                    $upload_pandata = $this->pan_obj->data();
                }
                $data = array(
                    'campaign_id' => $this->uri->segment(3),
                    'company_name' =>$this->input->post('company_name'),
                    'no_of_director' =>$this->input->post('no_of_director'),
                    'registered_address' =>$this->input->post('registered_address'),
                    'communication_address' =>$this->input->post('communication_address'),
                    'gst'=>$this->input->post('gst'),
                    'cin_img' => $upload_cin['file_name'],
                    'pan_img' => $upload_pandata['file_name'],
                );
                $dataarr=array();
                for($i=0; $i<sizeof($this->input->post('name_director')); $i++)
                {  $dataarr[] = array(
                    'campaign_id' =>$this->uri->segment(3),
                    'name_director' =>$this->input->post('name_director')[$i],
                    'din_director' =>$this->input->post('din_director')[$i],
                );
                }
                $this->load->model('director_model');
                $this->director_model->director_insert($dataarr);
                
                $campaign_id=$this->uri->segment(3);
                $data_update=array('user_company_type'=>'company_tab',);
                $this->campaign_model->update_campaign($campaign_id,$data_update);
                
                if ($this->company_model->company_insert($data)== true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/payment/'.$slug.'');
                }
            }
        }
        Template::set_view('campaign/create');
        Template::render();
    }
    
    /**
     * Function to save campaign payment tab
     */
    public function payment()
    {
        $slug=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'payment');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->campaign_model->get_custom_validation_rules('payment'));
            if ($this->form_validation->run() == FALSE)
            {
                Template::set('active_tab', 'payment');
                Template::set_view('campaign/create');
                Template::render();
            }
            else{
                $data = array(
                    'account_number' =>$this->input->post('account_number'),
                    'bank_name' =>$this->input->post('bank_name'),
                    'ifsc_code' =>$this->input->post('ifsc_code'),
                    'account_holder_name' =>$this->input->post('account_holder_name'),
                );
                if ($this->campaign_model->update_campaign($slug,$data) == true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/view');
                }
                
            }
        }
        Template::set_view('campaign/create');
        Template::render();
    }
    
    
    public function edit()
    { 
        $campaign_id=$this->uri->segment(3);
        Template::set('active_tab', 'people_team');
        /*this code run campaign project*/
        $campaign_list = $this->campaign_model->get_by_id($campaign_id);
        $this->load->model('category/category_model');
        $date_fetch=$this->category_model->get_list();
        $category_list=array();
        foreach ($date_fetch as $row)
        {
            $category_list[$row->category_name]=$row->category_name;
        }
        /*this code run campaign company*/
        $this->load->model('company_model');
        $company_list = $this->company_model->get_by_campaign_id($campaign_id);
        $this->load->model('director_model');
        $director_list=$this->director_model->get_by_campaign_id($campaign_id);
        /*this code run campaign people team user*/
        $this->load->model('people_team_model');
        $people_user_list = $this->people_team_model->get_by_campaign_id($campaign_id);
        Template::set('campaign_list',$campaign_list);
        Template::set('category_list',$category_list);
        Template::set('subcategory_list',array(''=>'--Select--'));
        Template::set('people_user_list',$people_user_list);
        Template::set('company_list',$company_list);
        Template::set('director_list',$director_list);
        Template::set_view('campaign/edit');
        Template::render();
    }
    
    /* this function used to user_id to fetch data by the user wise the data */
    public function view()
    {
        /* this function check user login */
        $this->auth->restrict();
        $data = $this->campaign_model->get_campaign_list();
        Template::set_view('campaign/view');
        Template::set('list_item', $data);
        Template::render();
    }
    
    public function views()
    {
        /* this function check user login */
        $this->auth->restrict();
        if ($this->session->role_id == 1) {
            $slug = $this->uri->segment(3);
            $data = $this->campaign_model->get_by_campaign();
            Template::set('list_item', $data);
            Template::set_view('campaign/admin_view');
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
        $result = $this->campaign_model->update_campaign($id, $data);
        echo $result;
    }
    /*
     *function used to feature_status 
     */
    public function feature_status()
    {
        $id = $this->input->get('id');
        $data = array(
            'feature' => $this->input->get('status')
        );
        $result = $this->campaign_model->update_campaign($id, $data);
        echo $result;
      
    }
    /* function used to status changes */
    public function active()
    {
        $id = $this->input->get('id');
        $data = array(
            'is_active' => $this->input->get('status')
        );
        $result = $this->campaign_model->update_campaign($id, $data);
        echo $result;
    }
    
    /* function used to soft delete */
    public function delete()
    {
        $id = $this->input->get('id');
        $data = array(
            'deleted' => 1
        );
        $result = $this->campaign_model->update_campaign($id, $data);
        echo $result;
    }
    
    /**
     * Function to load more campaign using ajax.
     */
    public function loadmore()
    {
        $this->load->helper(array('text','percentage'));
        $offset = $this->input->get('offset');
        $limit = $this->input->get('limit');
        $category = $this->input->get('category');
        $campaign_list = $this->campaign_model->load_more_campaign($offset, $limit, $category);
        Template::set('campaign_list',$campaign_list);
        Template::set_view('campaign/campaign_list');
        Template::render('ajax');
    }
    
    /**
     * this function used to view campaign details
     */
    public function preview()
    {        /* this function check user login */
        $this->auth->restrict();
        
        $campaign_id=$this->uri->segment(3);
        $campaign_list = $this->campaign_model->get_by_id($campaign_id);
   
        $this->load->model('company_model');
        $company_list = $this->company_model->get_by_campaign_id($campaign_id);
        
        $this->load->model('director_model');
        $director_list=$this->director_model->get_by_campaign_id($campaign_id);

        $this->load->model('people_team_model');
        $people_user_list = $this->people_team_model->get_by_campaign_id($campaign_id);
        
        Template::set('campaign_list',$campaign_list);
        Template::set('company_list',$company_list);
        Template::set('director_list',$director_list);
        Template::set('people_user_list',$people_user_list);
        Template::set_view('campaign/preview');
        Template::render();
    }
    
    
   /**
    * campaign edit
    * 
    */ 
    public function edit_create()
    {
        $campaign_id=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'project');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->campaign_model->get_custom_validation_rules('project'));
            $config['upload_path'] = './assets/campaign/';
            $config['allowed_types'] = 'gif|jpeg|jpg|png';
            $this->load->library('upload', $config);
            // checking validation
            if (empty($_FILES['image']['name']))
            {
                $this->form_validation->set_rules('image', 'Image', 'required');
            }
            if ($this->form_validation->run() == FALSE)
            {
                $error = array('error' => $this->upload->display_errors());
                $campaign_list = $this->campaign_model->get_by_id($campaign_id);
                $this->load->model('category/category_model');
                $date_fetch=$this->category_model->get_list();
                $category_list=array();
                $category_list[]='-select category-';
                foreach ($date_fetch as $row)
                {
                    $category_list[$row->category_name]=$row->category_name;
                }
                Template::set('campaign_list',$campaign_list);
                Template::set('category_list',$category_list);
                Template::set('subcategory_list',array(''=>'--Select--'));
                Template::set_view('campaign/edit');
            }
            else{
                if ($this->upload->do_upload('image'))
                {
                    $upload_data = $this->upload->data();
                    $project_update = array(
                        'user_id' => $this->session->user_id,
                        'title' =>$this->input->post('title'),
                        'slug' => url_title($this->input->post('title'), 'dash', true),
                        'subtitle' =>$this->input->post('subtitle'),
                        'category' =>$this->input->post('category'),
                        'sub_category'=>$this->input->post('sub_category'),
                        'target_audience' =>$this->input->post('target_audience'),
                        'description' =>$this->input->post('description'),
                        'image' => $upload_data['file_name'],
                        'video_url' =>$this->input->post('video_url'),
                        'status' => 'D',
                    );
                    
                    if ($this->campaign_model->update_campaign($campaign_id,$project_update) == true)
                    {
                        Template::set_message(lang('us_user_created_success'), 'success');
                        redirect('campaign/edit_funding/'.$campaign_id.'');
                    }
                    
                }
            }
        }
        $campaign_list = $this->campaign_model->get_by_id($campaign_id);
        $this->load->model('category/category_model');
        $date_fetch=$this->category_model->get_list();
        $category_list=array();
        $category_list[]='-select category-';
        foreach ($date_fetch as $row)
        {
            $category_list[$row->category_name]=$row->category_name;
        }
        Template::set('campaign_list',$campaign_list);
        Template::set('category_list',$category_list);
        Template::set('subcategory_list',array(''=>'--Select--'));
        Template::set_view('campaign/edit');
        Template::render();
    }
    
    /**
     * Function to save campaign fundinge detail
     */
    public function edit_funding()
    {
        $campaign_id=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'funding');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->campaign_model->get_custom_validation_rules('funding'));
            if ($this->form_validation->run() == FALSE)
            {
        
                $campaign_list = $this->campaign_model->get_by_id($campaign_id);
                $this->load->model('particulars/particulars_model');
                $particulars_list=$this->particulars_model->get_list();
                Template::set('campaign_list',$campaign_list);
                Template::set('particulars_list',$particulars_list);
                Template::set_view('campaign/edit');
                Template::render();
            }
            else{
                $final_deadline = null;
                $data_info_day_datetime=array();
                if('DAY'==$this->input->post('deadline_selecter'))
                {
                    $data_post=array('deadline_day' =>$this->input->post('deadline_day'));
                    array_push($data_info_day_datetime,$data_post);
                    $final_deadline=date('Y-m-d h:i:s', strtotime("+".$this->input->post('deadline_day')."days"));
                }
                elseif('DATE_TIME'==$this->input->post('deadline_selecter'))
                {
                    $data_post=array('deadline' =>$this->input->post('deadline_date').' '.$this->input->post('deadline_time').':00');
                    array_push($data_info_day_datetime,$data_post);
                    $final_deadline=$this->input->post('deadline_date').' '.$this->input->post('deadline_time').':00';
                }
                $data_post = array(
                    'final_deadline_type' =>$this->input->post('deadline_selecter'),
                    'final_deadline'=>$final_deadline,
                    '80G_availablity' =>$this->input->post('80G_availablity'),
                    'goal'=>$this->input->post('goal'),
                    'final_goal' =>$this->input->post('final_goal'),
                );
                $data=array_merge($data_post,$data_info_day_datetime[0]);
                if ($this->campaign_model->update_campaign($campaign_id,$data) == true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/edit_people_team/'.$campaign_id.'');
                }
                
            }
        }
        $campaign_list = $this->campaign_model->get_by_id($campaign_id);
        $this->load->model('particulars/particulars_model');
        $particulars_list=$this->particulars_model->get_list();
        Template::set('campaign_list',$campaign_list);
        Template::set('particulars_list',$particulars_list);
        Template::set_view('campaign/edit');
        Template::render();
    }
    
    
    /**
     * Function to save campaign people team tab
     */
    public function edit_people_team()
    {
        $this->load->model('people_team_model');
        $campaign_id=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'people_team');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->people_team_model->get_custom_validation_rules('people_team'));
            //aadhar config
            $config_adhaar['upload_path'] = './assets/adhaarcard/';
            $config_adhaar['allowed_types'] = 'gif|jpeg|jpg|png';
            //pan config
            $config_pan['upload_path'] = './assets/pancard/';
            $config_pan['allowed_types'] = 'gif|jpeg|jpg|png';
            $this->load->library('upload', $config_adhaar ,'adhaar');
            $this->load->library('upload', $config_pan,'pan');
            
            if (empty($_FILES['adhaarcard']['name']))
            {
                $this->form_validation->set_rules('adhaarcard', 'Adhaar card', 'required');
            }
            if (empty($_FILES['pancard']['name']))
            {
                $this->form_validation->set_rules('pancard', 'Pan card', 'required');
            }
            
            if ($this->form_validation->run() == FALSE)
            {
                $error = array(
                    'error' => $this->adhaar->display_errors(),
                    'error' => $this->pan->display_errors(),
                );
                Template::set('active_tab', 'people_team');
                $people_user_list=$this->people_team_model->get_by_campaign_id($campaign_id);
                Template::set('people_user_list',$people_user_list);
                $this->load->model('company_model');
                $company_list=$this->company_model->get_by_campaign_id($campaign_id);
                $this->load->model('director_model');
                $director_list=$this->director_model->get_by_campaign_id($campaign_id);
                Template::set('company_list',$company_list);
                Template::set('director_list',$director_list);
                Template::set_view('campaign/edit');
                Template::render();
            }
            else{
                $upload_adhaardata=array();
                if ($this->adhaar->do_upload('adhaarcard'))
                {
                    $upload_adhaardata = $this->adhaar->data();
                }
                $upload_pandata=array();
                if ($this->pan->do_upload('pancard'))
                {
                    $upload_pandata = $this->pan->data();
                }
                $data_people_update = array(
                    'campaign_id' => $this->uri->segment(3),
                    'name' =>$this->input->post('name'),
                    'education' =>$this->input->post('education'),
                    'email_id' =>$this->input->post('email_id'),
                    'phone_number' =>$this->input->post('phone_number'),
                    'facebook_profile_link'=>$this->input->post('facebook_profile_link'),
                    'linkedin_profile_link' =>$this->input->post('linkedin_profile_link'),
                    'twitter_profile_link' =>$this->input->post('twitter_profile_link'),
                    'adhaar_card_img' => $upload_adhaardata['file_name'],
                    'pan_card_img' => $upload_pandata['file_name'],
                );
         
                $data_update=array('user_company_type'=>'user_tab',);
                $this->campaign_model->update_campaign($campaign_id,$data_update);
                if ($this->people_team_model->people_user_delete_insert($campaign_id,$data_people_update) == true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/edit_payment/'.$campaign_id.'');
                }
            }
        }
        $people_user_list=$this->people_team_model->get_by_campaign_id($campaign_id);
        Template::set('people_user_list',$people_user_list);
        $this->load->model('company_model');
        $company_list=$this->company_model->get_by_campaign_id($campaign_id);
        $this->load->model('director_model');
        $director_list=$this->director_model->get_by_campaign_id($campaign_id);
        Template::set('company_list',$company_list);
        Template::set('director_list',$director_list);
        Template::set_view('campaign/edit');
        Template::render();
    }
    /**
     * funtion to save campaign company tab
     */
    public function edit_company()
    {
        $this->load->model('company_model');
        $campaign_id=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'people_team');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->company_model->get_custom_validation_rules('company'));
            //cin config
            $config_cin['upload_path'] = './assets/cin/';
            $config_cin['allowed_types'] = 'gif|jpeg|jpg|png';
            //pan config
            //pan config
            $config_pan['upload_path'] = './assets/companypan/';
            $config_pan['allowed_types'] = 'gif|jpeg|jpg|png';
            
            $this->load->library('upload', $config_cin ,'cin_obj');
            $this->load->library('upload', $config_pan,'pan_obj');
            if (empty($_FILES['cin_img']['name']))
            {
                $this->form_validation->set_rules('cin_img', 'CIN', 'required');
            }
            if (empty($_FILES['pan_img']['name']))
            {
                $this->form_validation->set_rules('pan_img', 'CIN', 'required');
            }
            if($this->form_validation->run() == FALSE)
            {
                $error = array(
                    'error' =>$this->cin_obj->display_errors(),
                    'error' =>$this->pan_obj->display_errors(),
                );
                $company_list=$this->company_model->get_by_campaign_id($campaign_id);
                $this->load->model('director_model');
                $director_list=$this->director_model->get_by_campaign_id($campaign_id);
                Template::set('company_list',$company_list);
                Template::set('director_list',$director_list);
                Template::set_view('campaign/edit');
                Template::render();
            }
            else{
                $upload_cin=array();
                if ($this->cin_obj->do_upload('cin_img'))
                {
                    $upload_cin = $this->cin_obj->data();
                }
                $upload_pandata=array();
                if ($this->pan_obj->do_upload('pan_img'))
                {
                    $upload_pandata = $this->pan_obj->data();
                }
                $data_company_update = array(
                    'campaign_id' => $this->uri->segment(3),
                    'company_name' =>$this->input->post('company_name'),
                    'no_of_director' =>$this->input->post('no_of_director'),
                    'registered_address' =>$this->input->post('registered_address'),
                    'communication_address' =>$this->input->post('communication_address'),
                    'gst'=>$this->input->post('gst'),
                    'cin_img' => $upload_cin['file_name'],
                    'pan_img' => $upload_pandata['file_name'],
                );
                $dataarr=array();
                for($i=0; $i<sizeof($this->input->post('name_director')); $i++)
                {  $dataarr[] = array(
                    'campaign_id' =>$this->uri->segment(3),
                    'name_director' =>$this->input->post('name_director')[$i],
                    'din_director' =>$this->input->post('din_director')[$i],
                );
                }
                $this->load->model('director_model');
                $this->director_model->director_delete_insert($campaign_id,$dataarr);
                $data_update=array('user_company_type'=>'company_tab',);
                $this->campaign_model->update_campaign($campaign_id,$data_update);
                if ($this->company_model->company_delete_insert($campaign_id,$data_company_update)== true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/edit_payment/'.$campaign_id.'');
                }
            }
        }
        $company_list=$this->company_model->get_by_campaign_id($campaign_id);
        $this->load->model('director_model');
        $director_list=$this->director_model->get_by_campaign_id($campaign_id);
        Template::set('company_list',$company_list);
        Template::set('director_list',$director_list);
        Template::set_view('campaign/edit');
        Template::render();
    }
    
    /**
     * Function to save campaign payment tab
     */
    public function edit_payment()
    {
        $campaign_id=$this->uri->segment(3);
        /* this function check user login */
        $this->auth->restrict();
        Template::set('active_tab', 'payment');
        if (isset($_POST['save']))
        {
            $this->form_validation->set_rules($this->campaign_model->get_custom_validation_rules('payment'));
            if ($this->form_validation->run() == FALSE)
            {
                Template::set('active_tab', 'payment');
                Template::set_view('campaign/edit');
                Template::render();
            }
            else{
                $data = array(
                    'account_number' =>$this->input->post('account_number'),
                    'bank_name' =>$this->input->post('bank_name'),
                    'ifsc_code' =>$this->input->post('ifsc_code'),
                    'account_holder_name' =>$this->input->post('account_holder_name'),
                );
                if ($this->campaign_model->update_campaign($campaign_id,$data) == true)
                {
                    Template::set_message(lang('us_user_created_success'), 'success');
                    redirect('campaign/view');
                }
                
            }
        }
        $campaign_list = $this->campaign_model->get_by_id($campaign_id);
        Template::set('campaign_list',$campaign_list);
        Template::set_view('campaign/edit');
        Template::render();
    }
    
    
}

/* End of file /bonfire/modules/users/controllers/users.php */
