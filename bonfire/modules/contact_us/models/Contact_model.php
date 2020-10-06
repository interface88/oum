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
class Contact_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'contact_us';

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
        array('field' => 'name', 'label' => 'Name','rules' => 'required'),
        array('field' => 'email', 'label' => 'Eamil','rules' => 'required'),
        array('field' => 'phone', 'label' => 'Mobile Number','rules' => 'required|numeric'),
        array('field' => 'subject', 'label' => 'Subject','rules' => 'required'),
        array('field' => 'message', 'label' => 'Message','rules' => 'required')
        
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
        /* function used to insert contact_us */
    public function insert_contact($data = array())
    {
        return $this->db->insert($this->table_name, $data);
    }

    /* function used to insert contact_us end */
    /* this function used to update contact_us */
    public function update_contact($slug = null, $data = array())
    {
        $this->db->where('id', $slug);
        return $this->db->update($this->table_name, $data);
    }

    /* function used to update contact_us end */
    /* function used to edit/view contact_us */
    public function get_list($slug = NULL)
    {
        if ($slug === NULL) {
            $query = $this->db->get($this->table_name);
            return $query->result();
        }
        $query = $this->db->get_where($this->table_name, array(
            'id' => $slug
        ));
        return $query->row();
    }
    /* functoin used to edit/view contact_us end */
    
    public function get_custom_validation_rules($type = '')
    {
        if($type == 'contact'){
            return $this->validation_rules;
        }
    }
}
//end User_model
