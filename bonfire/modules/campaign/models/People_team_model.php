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
class People_team_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'campaign_people';
    /** @var string Name of the user meta table. */
    protected $meta_table = 'user_meta';

    /** @var string Name of the roles table. */
    protected $roles_table = 'roles';
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
public function people_insert($data)
{
   return $this->db->insert($this->table_name,$data);
}
/*this function used to insert data end*/

/**
 * People delete campaign_id and new insert
 */
public function people_user_delete_insert($campaign_id,$data)
    {
        $this->db->delete($this->table_name, array('campaign_id' => $campaign_id));
        return $this->db->insert($this->table_name,$data);
    }
    
/**
 *
 * @param People team user
 * @return People team user
 */

public function get_people_team_by_field($field = NULL , $value = NULL)
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
 * @return people team user
 */
public function get_by_campaign_id($campaign_id = NULL)
{
    return $this->get_people_team_by_field('campaign_id', $campaign_id);
}

/**
 *
 * @param Campaign User Validation
 * @return people_validation_rules
 */

    public function get_custom_validation_rules($type = '')
    {
        if($type == 'people_team'){
            return $this->people_validation_rules;
        }
    }
}
//end User_model
