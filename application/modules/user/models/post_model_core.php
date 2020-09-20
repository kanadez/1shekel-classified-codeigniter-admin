<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Classified admin Controller
 *
 * This class handles user account related functionality
 *
 * @package		User
 * @subpackage	UserModelCore
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */



class Post_model_core extends CI_Model 

{

	function __construct()
	{

		parent::__construct();
		$this->load->database();
	}

	function get_all_categories()
	{
		$this->db->order_by('title','asc');
		$query = $this->db->get_where('categories',array('parent'=>0,'status'=>1));
		$categories = array();
		foreach ($query->result() as $row) {
			array_push($categories,$row);
			$this->db->order_by('title','asc');
			$child_query = $this->db->get_where('categories',array('parent'=>$row->id,'status'=>1));
			foreach ($child_query->result() as $child) {
				array_push($categories,$child);
			}

		}
		return $categories;
	}

	function get_all_parent_categories()
	{
		$this->db->order_by('title','asc');
		$this->db->where('parent',0);
		$this->db->where('status',1);
		$query = $this->db->get('categories');
		return $query;
	}

	function get_all_child_categories($id, $limit = 'all')
	{
		$this->db->order_by('title','asc');
		$this->db->where('parent',$id);
		$this->db->where('status',1);
		if($limit!= 'all')
			$this->db->limit($limit);
		$query = $this->db->get('categories');
		return $query;
	}

	function count_post_by_category_id($cat_id)
	{
		$cat_id = $this->db->escape($cat_id ) ;
		$this->db->where("(parent_category = $cat_id OR category = $cat_id)");
		$this->db->where('status',1);
		$query = $this->db->get('posts');
		return $query->num_rows();
	}

	function get_category_icon($cat_id)
	{
		$this->db->where('id',$cat_id);
		$query = $this->db->get('categories');
		if($query->num_rows()>0){
			$cat = $query->row();
			if($cat->fa_icon!='')
				return $cat->fa_icon;
			else
				return 'fa-picture-o';
		}
		return 'fa-picture-o';
	}

	function insert_post($data)
	{
		$this->db->insert('posts',$data);
		return $this->db->insert_id();
	}

	function update_post($data,$id)
	{
		$this->db->update('posts',$data,array('id'=>$id));
	}

	function get_post_by_id($id)
	{
		$query = $this->db->get_where('posts',array('id'=>$id));
		if($query->num_rows()<=0)
		{
			echo 'Invalid post id';
			die;
		}
		else
		{
			return $query;
		}
	}

	function get_post_by_unique_id($unique_id)
	{
		$query = $this->db->get_where('posts',array('unique_id'=>$unique_id));
		if($query->num_rows()<=0)
		{
			echo 'Invalid post id';
			die;
		}
		else
		{
			return $query;
		}
	}

    function get_similar_posts_by_category($category, $parent_category,  $post_id)
    {
        $this->db->where("(parent_category = $parent_category OR category = $category)");
        $this->db->where('id !=', (int)$post_id);
        $this->db->limit(5, 0);
        $this->db->where('status',1);
        $query = $this->db->get('posts');

        return $query;

    }

	function get_recent_posts($limit=6) {
		$this->db->where('status',1);
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('posts');
		return $query;
	}

	function get_featured_posts($limit=6) {
		$this->db->where('status',1);
		$this->db->where('featured',1);
		$this->db->limit($limit);
		$this->db->order_by('id', 'desc');
		$query = $this->db->get('posts');
		return $query;
	}

	function get_category_posts($limit=6,$category_id='') {
		$this->db->where('status',1);
		$this->db->where("(category=".$category_id." or parent_category=".$category_id.")");
		$this->db->limit($limit);
		$this->db->order_by('id');
		$query = $this->db->get('posts');
		return $query;
	}

	function get_member_posts($limit=6,$user_id='') {
		$this->db->where('status',1);
		$this->db->where('created_by',$user_id);
		$this->db->limit($limit);
		$this->db->order_by('id');
		$query = $this->db->get('posts');
		return $query;
	}

	function get_location_posts($limit=6,$location_id='', $location_type='country') {
		$this->db->where('status',1);
		$this->db->where($location_type,$location_id);
		$this->db->limit($limit);
		$this->db->order_by('id');
		$query = $this->db->get('posts');
		return $query;
	}

	function inc_view_count_by_unique_id($unique_id) {

		if (isset($_COOKIE['viewcookie'.$unique_id])==FALSE)
		{
			$CI = get_instance();
			$CI->load->database();

			$query = $CI->db->get_where('posts',array('unique_id'=>$unique_id));
			if($query->num_rows()>0)
			{
				$row = $query->row();
				$total_view = $row->total_view;
				$total_view++;
			}		
			else
				$total_view = 0;	
			$CI->db->update('posts',array('total_view'=>$total_view),array('unique_id'=>$unique_id));
			setcookie("viewcookie".$unique_id, 1, time()+1800);
			return $total_view;
		}
	}

	function increment_featured_date($increment_day_count,$post_id) {


		$query = $this->db->get_where('catalog', array('num' => $post_id));
		
                if($query->num_rows()>0)
			$row = $query->row();
		else
			return FALSE;

		$date = $row->highlighted;
		//$date = new date($date);
		//$date->add(new DateInterval('P'.$increment_day_count.'D'));
		
		//die($date->format("Y-m-d H:i:s"));

		$this->db->where('num',$post_id);
		$this->db->set('highlighted', $date+$increment_day_count*86400);
		$this->db->update('catalog');

		return TRUE;
	}



	function get_location_id_by_name($name,$type,$parent, $country)
	{
		if($parent ==0)
			$query = $this->db->get_where('locations',array('status'=>1,'name'=>$name,'type'=>$type, 'parent_country'=>$country));
		else
			$query = $this->db->get_where('locations',array('status'=>1,'name'=>$name,'type'=>$type,'parent'=>$parent, 'parent_country'=>$country));

		if($query->num_rows()>0)
		{
			$row = $query->row();
			return $row->id;
		}
		else
		{
			$data = array();
			$data['type'] 	= $type;
			$data['name'] 	= $name;
			$data['parent']	= $parent == 0 ? $country : $parent;
			$data['parent_country']= $country;
			$this->db->insert('locations',$data);
			return $this->db->insert_id();
		}
	}
}



/* End of file install.php */
/* Location: ./application/modules/user/models/user_model_core.php */