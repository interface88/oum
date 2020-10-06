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
class Donation_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'oum_donor';
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
    * this function used to insert data
    */
    public function donate_insert($data)
    {
        return $this->db->insert($this->table_name,$data);
    }
    /**
     * this functton used to admin donation list all
     */
    
    public function get_list($donor_id = NULL, $start = 0, $limit = 10)
    {
        $this->db->limit($limit, $start);
        if ($donor_id == NULL)
        {
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        else{
            $query = $this->db->get_where($this->table_name, array(
                'donor_id' => $donor_id
            ));
            return $query->row();
           }
    }
    public function get_by_donation_list($user_id = NULL, $start = 0, $limit = 10)
    {
        $this->db->limit($limit, $start);
        if ($user_id == NULL)
        {
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        else{
            $query = $this->db->get_where($this->table_name, array(
                'user_id' => $user_id
            ));
            return $query->result();
        }
    }
    
}
//end User_model
