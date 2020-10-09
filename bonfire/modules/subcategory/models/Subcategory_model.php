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
class Subcategory_model extends BF_Model
{
    /** @var string Name of the oum_campaign table. */
    protected $table_name = 'sub_category';
    protected $table_name2 = 'category';
    /** @var boolean Use soft deletes or not. */
    protected $soft_deletes = true;
    /** @var string The date format to use. */
    protected $date_format = 'datetime';
    /** @var boolean Set the modified time automatically. */
    protected $set_modified = false;
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
/*functoin used to insert subcategory*/
public function insert_subcategory($data = array())
{
    return  $this->db->insert($this->table_name, $data);
}
/*functoin used to insert subcategory end*/
/*this function used to update subcategory */
public function update_subcategory($slug = null, $data = array())
{
    $this->db->where('sub_category_id', $slug);
    return  $this->db->update($this->table_name, $data);
}
/*function used to update subcategory end*/
/*functoin used to edit/list subcategory*/
public function get_list($slug = NULL)
{
    if ($slug === NULL)
    {
       $this->db->select("$this->table_name.*,$this->table_name2.category_name");
       $this->db->from($this->table_name);
       $this->db->join($this->table_name2,"$this->table_name2.category_id=$this->table_name.category_id");
       $this->db->where($this->table_name.'.is_delete',0);
       $query = $this->db->get("");
       return $query->result();
    }
    $query = $this->db->get_where($this->table_name, array('sub_category_id' => $slug, 'is_delete'=>0,));
    return $query->row();
}
/*functoin used to edit/list category end*/

/*functoin used to edit/list subcategory*/
public function get_by_category_name($category_name = NULL)
{
        $this->db->select("$this->table_name.*");
        $this->db->from($this->table_name);
        $this->db->join($this->table_name2,"$this->table_name2.category_id=$this->table_name.category_id");
        $this->db->where("$this->table_name2.category_name",$category_name);
        $query = $this->db->get("");
        return $query->result();
}
/*functoin used to edit/list category end*/

}
//end User_model
