<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classified users_model_core model
 *
 * This class handles users_model_core management related functionality
 *
 * @package     Admin
 * @subpackage  users_model_core
 * @author      dbcinfotech
 * @link        http://dbcinfotech.net
 */

class Users_model_core extends CI_Model
{
    var $pages,$menu;

    function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->pages = array();
    }

    function get_user_by_id($id)
    {
        $query = $this->db->get_where('user',array('num'=>$id));
        return $query->row();
    }

    function get_all_users_by_range($start,$sort_by='')
    {
        $this->db->order_by($sort_by, "asc");
        $this->db->where('temporary',0);
        $this->db->where('deleted',0);
        $query = $this->db->get('user');
        
        return $query;
    }

    function count_all_pages()
    {
        $this->db->where('status',1);
        $query = $this->db->get('users');
        return $query->num_rows();
    }

    function ban_user($id){
        $data['banned'] = 1;
        $this->db->update('user', $data, array('num'=> $id));
        $data = array();
        $data['status'] = 0;
        $this->db->where('author',$id);
        $this->db->update('catalog',$data);
    }

    function unban_user($id){
        $data['banned'] = 0;
        $this->db->update('user', $data, array('num'=> $id));
    }
    
    function delete_user($id){
        $this->db->where('num', $id);
        $this->db->update('user', array('deleted'=>1), array('num'=>$id));
        $this->db->update('catalog',array('status'=>0),array('author'=>$id));
    }

    function get_all_user_emails()
    {
        $sql = "select email from user where num <> 1 and status = 1";
        $query = $this->db->query($sql);
        return $query;
    }

    function get_all_usertypes()
    {
        $query = $this->db->get_where('usertype',array('status'=>1,'id !='=>1));
        return $query->result();
    }

    function insert_user($data)
    {
        $this->db->insert('user',$data);
        return $this->db->insert_id();
    }

}

/* End of file page_model.php */
/* Location: ./system/application/models/page_model.php */