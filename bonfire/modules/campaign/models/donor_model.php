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
class donor_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'oum_donor';
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
    public function donor_insert($data)
    {
        return $this->db->insert($this->table_name,$data);
    }
    /*this function used to insert data end*/
    
}
//end User_model
