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
class Particulars_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'particulars';

    /** @var boolean Use soft deletes or not. */
    protected $soft_deletes = true;

    /** @var string The date format to use. */
    protected $date_format = 'datetime';

    /** @var boolean Set the modified time automatically. */
    protected $set_modified = false;

    /** @var boolean Skip the validation. */
    protected $skip_validation = false;

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

        // --------------------------------------------------------------------------
        // CRUD Method Overrides.
        // --------------------------------------------------------------------------
        /* function used to insert particulars */
    public function insert_particulars($data = array())
    {
        return $this->db->insert($this->table_name, $data);
    }

    /* function used to insert particulars end */
    /* this function used to update particulars */
    public function update_particulars($slug = null, $data = array())
    {
        $this->db->where('id', $slug);
        return $this->db->update($this->table_name, $data);
    }

    /* function used to update particulars end */
    /* function used to edit/view particulars */
    public function get_list($slug = NULL)
    {
        if ($slug === NULL) {
            $this->db->where('deleted',0);
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        $query = $this->db->get_where($this->table_name, array(
            'id' => $slug,
            'deleted'=>0,
        ));
        return $query->row();
    }
    /* functoin used to edit/view particulars end */
}
//end User_model
