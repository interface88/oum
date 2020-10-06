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
class Company_model extends BF_Model
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
    protected $team_validation_rules = array(
        array('field' => 'company_name', 'label' => 'Company Name','rules' => 'required'),
       // array('field' => 'no_of_director', 'label' => 'No of Director','rules' => 'required|numeric'),
        array('field' => 'registered_address', 'label' => 'Registered Address','rules' => 'required|max_length[500]'),
     //   array('field' => 'communication_address', 'label' => 'Communication address','rules' => 'max_length[500]'),
      //  array('field' => 'gst', 'label' => 'GST','rules' => 'max_length[20]'),
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

    /**
     *
     * @param This function used to insert company data
     * @return 
     */
public function company_insert($data)
    {
        return $this->db->insert($this->table_name, $data);
    }
    
    /**
     *
     * @param Company 
     * @return Company
     */
    
    public function get_company_by_field($field = NULL , $value = NULL)
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
     * @return Company
     */
    public function get_by_campaign_id($campaign_id = NULL)
    {
        return $this->get_company_by_field('campaign_id', $campaign_id);
    }

    /**
     *
     * @param Campaign Company Validation
     * @return team_validation_rules
     */
    public function get_custom_validation_rules($type = '')
    {
        if ($type == 'company') {
            return $this->team_validation_rules;
        }
    }
}
//end User_model
