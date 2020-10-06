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
class Director_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'director';
   
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
    public function director_insert($data)
    {
        return $this->db->insert_batch($this->table_name,$data);
    }
    /*this function used to insert data end*/
    /**
     *
     * @param Company
     * @return Company
     */
    
    public function get_director_by_field($field = NULL , $value = NULL)
    {
        $query = $this->db->get_where($this->table_name, array(
            $field => $value,
            'deleted' => 0
        ));
        return $query->result();
    }
    
    /**
     *
     * @param Campaign $campaign_id
     * @return people team user
     */
    public function get_by_campaign_id($campaign_id = NULL)
    {
        return $this->get_director_by_field('campaign_id', $campaign_id);
    }
    
    /**
     *
     * @param Campaign User Validation
     * @return people_validation_rules
     */
}
//end User_model
