<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classified System_model model
 *
 * This class handles System_model management related functionality
 *
 * @package		Admin
 * @subpackage	System_model
 * @author		dymm
 * @link		http://dbcinfotech.net
 */
require_once'system_model_core.php';
class System_model extends System_model_core {

	public function __construct()
	{
		parent::__construct();
	}
	function update_email_tmpl($data,$id)
	{

		
		$exists = $this->get_email_by_id($id);
		if($exists->num_rows){
			$this->db->update('emailtmpl',$data,array('id'=>$id));
		}else{
			$this->db->insert('emailtmpl',$data);
		}
	}
}