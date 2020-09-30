<?php defined('BASEPATH') || exit('No direct script access allowed');
/**
 * Bonfire
 *
 * An open source project to allow developers to jumpstart their development of
 * CodeIgniter applications.
 *
 * @package   Bonfire
 * @author    Bonfire Dev Team
 * @copyright Copyright (c) 2011 - 2015, Bonfire Dev Team
 * @license   http://opensource.org/licenses/MIT
 * @link      http://cibonfire.com
 * @since     Version 1.0
 * @filesource
 */

/**
 * Campaign Model.
 *
 * The central way to access and perform CRUD on users.
 *
 * @package Bonfire\Modules\Users\Models\User_model
 * @author  Bonfire Dev Team
 * @link    http://cibonfire.com/docs/developer
 */
class company_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'campaign_company';
    /** @var string Name of the user meta table. */
    protected $meta_table = 'user_meta';

    /** @var string Name of the roles table. */
    protected $roles_table = 'roles';

    /** @var boolean Use soft deletes or not. */
    protected $soft_deletes = true;

    /** @var string The date format to use. */
    protected $date_format = 'datetime';

    /** @var boolean Set the modified time automatically. */
    protected $set_modified = false;

    /** @var boolean Skip the validation. */
    protected $skip_validation = true;

    /** @var array Validation rules. */
    protected $validation_rules = array(
        
    );

    /** @var Array Additional validation rules only used on project tab. */
    protected $project_validation_rules = array(
        array('field' => 'title', 'label' => 'Title','rules' => 'required|max_length[50]'),
        array('field' => 'subtitle', 'label' => 'Subtitle','rules' => 'max_length[100]'),
        array('field' => 'category', 'label' => 'Category','rules' => 'required'),
        array('field' => 'sub_category', 'label' => 'Sub category','rules' => 'required'),
        array('field' => 'target_audience', 'label' => 'Target audience','rules' => 'required|numeric'),
        array('field' => 'description', 'label' => 'Project description','rules' => 'required'),
        //array('field' => 'image', 'label' => 'Campaign Image ','rules' => 'required'),
        array('field' => 'video_url', 'label' => 'Video Url','rules' => 'valid_url|max_length[100]')
    );
    
    /** @var Array Additional validation rules only used on project tab. */
    protected $funding_validation_rules = array(
       // array('field' => 'deadline_day', 'label' => 'Campaign Duration','rules' => 'numeric'),
       // array('field' => 'deadline', 'label' => 'Campaign Duration','rules' => 'required'),
        array('field' => '80G_availablity', 'label' => 'Option for 80G','rules' => 'required'),
        array('field' => 'goal', 'label' => 'Goal','rules' => 'required|numeric'),
       // array('field' => 'final_goal', 'label' => 'Final Goal','rules' => 'required|numeric')
    );
    
    /** @var Array Additional validation rules only used on project tab. */
    protected $people_validation_rules = array(
        array('field' => 'name', 'label' => 'Name','rules' => 'required|max_length[100]'),
        array('field' => 'email_id', 'label' => 'Email','rules' => 'valid_email|max_length[100]'),
        array('field' => 'education', 'label' => 'Education','rules' => 'required|max_length[100]'),
        array('field' => 'phone_number', 'label' => 'Phone','rules' => 'required|max_length[50]'),
        array('field' => 'facebook_profile_link', 'label' => 'Facebook','rules' => 'valid_url|max_length[100]'),
        array('field' => 'linkedin_profile_link', 'label' => 'LinkedIn','rules' => 'valid_url|max_length[100]'),
        array('field' => 'twitter_profile_link', 'label' => 'Twitter','rules' => 'max_length[100]'),
        //array('field' => 'adhaar_card_img', 'label' => 'education','rules' => 'required|max_length[50]'),
        //array('field' => 'pan_card_img', 'label' => 'education','rules' => 'required|max_length[50]')
    );  
    
    protected $team_validation_rules = array(
        array('field' => 'company_name', 'label' => 'Company Name','rules' => 'required'),
        array('field' => 'no_of_director', 'label' => 'No of Director','rules' => 'required|numeric'),
        array('field' => 'registered_address', 'label' => 'Registered Address','rules' => 'required|max_length[500]'),
        array('field' => 'communication_address', 'label' => 'Communication address','rules' => 'max_length[500]'),
        array('field' => 'gst', 'label' => 'GST','rules' => 'max_length[20]'),
       // array('field' => 'cin_img', 'label' => 'CIN','rules' => 'max_length[50]'),
        //array('field' => 'pan_img', 'label' => 'PAN','rules' => 'max_length[50]')
    );  
      
    /** @var Array Additional validation rules only used on project tab. */
    protected $payment_validation_rules = array(
        array('field' => 'account_number', 'label' => 'Account Number','rules' => 'required|numeric'),
        array('field' => 'bank_name', 'label' => 'Bank Name','rules' => 'required'),
        array('field' => 'ifsc_code', 'label' => 'IFSC Code','rules' => 'required|max_length[500]'),
        array('field' => 'account_holder_name', 'label' => 'Account Holders Name','rules' => 'max_length[500]')
    );

    /** @var array Metadata for the model's database fields. */
    protected $field_info = array(
        array('name' => 'id', 'primary_key' => 1),
        array('name' => 'created_on'),
        array('name' => 'deleted'),
        array('name' => 'role_id'),
        array('name' => 'email'),
        array('name' => 'username'),
        array('name' => 'password_hash'),
        array('name' => 'reset_hash'),
        array('name' => 'last_login'),
        array('name' => 'last_ip'),
        array('name' => 'banned'),
        array('name' => 'ban_message'),
        array('name' => 'reset_by'),
        array('name' => 'display_name'),
        array('name' => 'display_name_changed'),
        array('name' => 'timezone'),
        array('name' => 'language'),
        array('name' => 'active'),
        array('name' => 'activate_hash'),
        array('name' => 'force_password_reset'),
    );

    //--------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    //--------------------------------------------------------------------------
    // CRUD Method Overrides.
    //--------------------------------------------------------------------------
/*this function used to insert data*/
public function company_insert($data)
{
   return $this->db->insert($this->table_name,$data);
}
/*this function used to insert data end*/
    
    public function get_custom_validation_rules($type = '')
    {
        if($type == 'project'){
            return $this->project_validation_rules;
        }
        
        if($type == 'funding'){
            return $this->funding_validation_rules;
        }
        
        if($type == 'people_team'){
            return $this->people_validation_rules;
        }

        if($type == 'company'){
            return $this->team_validation_rules;
        }
        
        if($type == 'payment'){
            return $this->payment_validation_rules;
        }
    }
}
//end User_model
