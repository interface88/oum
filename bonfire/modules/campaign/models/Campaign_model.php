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
 * @copyright Copyright (c) 2011 - 2015, Bonfire Dev Team
 * @license http://opensource.org/licenses/MIT
 * @link http://cibonfire.com
 * @since Version 1.0
 * @filesource
 */

/**
 * Campaign Model.
 *
 * The central way to access and perform CRUD on users.
 *
 * @package Bonfire\Modules\Users\Models\User_model
 * @author Bonfire Dev Team
 * @link http://cibonfire.com/docs/developer
 */
class Campaign_model extends BF_Model
{

    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'campaign';

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
    protected $validation_rules = array();

    /** @var Array Additional validation rules only used on project tab. */
    protected $project_validation_rules = array(
        array(
            'field' => 'title',
            'label' => 'Title',
            'rules' => 'required|max_length[50]'
        ),
        array(
            'field' => 'subtitle',
            'label' => 'Subtitle',
            'rules' => 'max_length[100]'
        ),
        array(
            'field' => 'category',
            'label' => 'Category',
            'rules' => 'required'
        ),
        array(
            'field' => 'sub_category',
            'label' => 'Sub category',
            'rules' => 'required'
        ),
        array(
            'field' => 'target_audience',
            'label' => 'Target audience',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'description',
            'label' => 'Project description',
            'rules' => 'required'
        ),
        // array('field' => 'image', 'label' => 'Campaign Image ','rules' => 'required'),
        array(
            'field' => 'video_url',
            'label' => 'Video Url',
            'rules' => 'valid_url|max_length[100]'
        )
    );

    /** @var Array Additional validation rules only used on project tab. */
    protected $funding_validation_rules = array(
        // array('field' => 'deadline_day', 'label' => 'Campaign Duration','rules' => 'numeric'),
        // array('field' => 'deadline', 'label' => 'Campaign Duration','rules' => 'required'),
        array(
            'field' => '80G_availablity',
            'label' => 'Option for 80G',
            'rules' => 'required'
        ),
        array(
            'field' => 'goal',
            'label' => 'Goal',
            'rules' => 'required|numeric'
        ),
        array(
            'field' => 'final_goal',
            'label' => 'Final Goal',
            'rules' => 'required|numeric'
        )
    );

    protected $payment_validation_rules = array(
        array(
            'field' => 'account_number',
            'label' => 'Account Number',
            'rules' => 'required|numeric'
        ),
/*        array(
            'field' => 'bank_name',
            'label' => 'Bank Name',
            'rules' => 'required'
        ),
        array(
            'field' => 'ifsc_code',
            'label' => 'IFSC Code',
            'rules' => 'required|max_length[500]'
        ),
        array(
            'field' => 'account_holder_name',
            'label' => 'Account Holders Name',
            'rules' => 'max_length[500]'
        )
  */
    );

    // --------------------------------------------------------------------------

    /**
     * Constructor
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    // --------------------------------------------------------------------------
    // CRUD Method Overrides.
    // --------------------------------------------------------------------------

    
    /**
     * Find a single user based on a field/value match, including role information.
     *
     * @param string $field
     *            The field to match. If 'both', attempt to find a user
     *            with the $value field matching either the username or email.
     * @param string $value
     *            The value to search for.
     * @param string $type
     *            The type of where clause to create ('and' or 'or').
     *            
     * @return boolean|object An object with the user's info, or false on failure.
     */
    public function find_by($field = null, $value = null, $type = 'and')
    {
        $this->preFind();
        return parent::find_by($field, $value, $type);
    }

    /**
     * Create a new user in the database.
     *
     * @param array $data
     *            An array of user information. 'password' and either 'email'
     *            or 'username' are required, depending on the 'auth.use_usernames' setting.
     *            'email' or 'username' must be unique. If 'role_id' is not included, the default
     *            role from the Roles model will be assigned.
     *            
     * @return boolean|integer The ID of the new user on success, else false.
     */
    public function insert($data = array())
    {
        $id = parent::insert($data);
        Events::trigger('save', $id);
        return $id;
    }

    public function update_campaign($campaign_id = null, $data = array())
    {
        $this->db->where('campaign_id', $campaign_id);
        return $this->db->update($this->table_name, $data);
    }

    public function update_pledge($slug = null, $pledge)
    {
        $this->db->set('pledge', 'pledge+' . $pledge, FALSE);
        $this->db->where("campaign_id", $slug);
        return $this->db->update($this->table_name);
    }
    
    public function get_campaign_by_field($field = NULL , $value = NULL)
    {
        $query = $this->db->get_where($this->table_name, array(
            $field => $value,
            'deleted' => 0
        ));
        return $query->row();
    }

    /**
     *
     * @param Campaign $campaign_id
     * @return Campaign
     */
    public function get_by_id($campaign_id = NULL)
    {
        return $this->get_campaign_by_field('campaign_id', $campaign_id);
    }
    
    /**
     * @param campaign $slug
     * @return campaign
     */
    public function get_by_slug($slug = NULL)
    {
        return $this->get_campaign_by_field('slug', $slug);
    }
    
    public function get_campaign_list($user_id = NULL, $start = 0, $limit = 10)
    {
        $this->db->limit($limit, $start);
             if($user_id == NULL)
        {
                $query = $this->db->get_where($this->table_name, array('user_id' => $this->session->user_id, 'deleted' =>0));
                 return $query->result();
        }
        else{
                $query = $this->db->get_where('user_id' , $user_id);
                $query = $this->db->get_where($this->table_name, array(
                    'deleted' => 0
                ));
                return $query->result();
            }
    }
   /**
    * function used to admin all campaign view
    */ 
    public function get_by_campaign()
    {
        $query = $this->db->get_where($this->table_name, array(
            'deleted' => 0
        ));
        return $query->result();
    }
    
    /**
     * Function to get campaign on home 
     * */
    public function get_front_campaign($start = 0, $limit = 6){
        $this->db->limit($limit, $start);
        $this->db->where('deleted', 0);
        $this->db->where('status', 'A');
        $this->db->order_by('campaign_id', 'DESC');
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
    
    /**
     * Function to get campaign on home
     * */
    public function get_front_campaign_by_hit($start = 0, $limit = 6){
        $this->db->limit($limit, $start);
        $this->db->where('deleted', 0);
        $this->db->where('status', 'A');
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
    
    public function get_front_campaign_by_feature($start = 0, $limit = 6){
        $this->db->limit($limit, $start);
        $this->db->where('deleted', 0);
        $this->db->where('status', 'A');
        $this->db->where('feature', 1);
        $this->db->order_by('campaign_id', 'DESC');
        $query = $this->db->get($this->table_name);
        return $query->result();
    }
    
    public function is_camapaign_owner($campaign_id , $user_id){
        $this->db->where('campaign_id',$campaign_id);
        $this->db->where('user_id',$user_id);
        $result = $this->db->get($this->table_name)->num_rows();
        return $result == 0 ? true : false; 
    }
    
    // GET TOP 5 CATEGORIES
    // GET TOP 5 CAMPAIGN BY DONATION 
    // GET TOP 5 CAMPAIGN BY HIT 
    // GET TOP 5 CAMPAIGN ON COMPLETION
    
    public function get_custom_validation_rules($type = '')
    {
        if($type == 'project'){
            return $this->project_validation_rules;
        }
        if($type == 'funding'){
            return $this->funding_validation_rules;
        }
         if($type == 'payment'){
             return $this->payment_validation_rules;
        }
    }
}
//end User_model
