<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Classified category_model_core model
 *
 * This class handles category_model_core management related functionality
 *
 * @package		Admin
 * @subpackage	category_model_core
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */
class Classified_model_core extends CI_Model 
{
	var $category,$menu;

	function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->category = array();
	}

	function check_post_permission($id)
	{
		$post = $this->get_estate_by_id($id);
		if(is_admin()==FALSE && $post->created_by!=$this->session->userdata('user_id'))
		{
			return FALSE;
		}
		else
			return TRUE;
	}

	function get_post_by_id($id)
	{
		$query = $this->db->get_where('catalog', array('num'=>$id,'status !='=>0));
		if($query->num_rows()>0)
		{
			return $query->row();
		}
		else
		{
			die('Post not found');
		}
	}

	function delete_post_by_id($id=''){
            /*$post = $this->get_post_by_id($id);
            echo $post->featured_img;
            $images = ($post->gallery!='')?json_decode($post->gallery):array();

            foreach ($images as $img) {
                    unlink('./uploads/gallery/'.$img);
            }

            unlink('./uploads/images/'.$post->featured_img);
            unlink('./uploads/thumbs/'.$post->featured_img);
            // $data['status'] = 0;
            $this->db->delete('posts',array('id'=>$id));*/
            //$query = $this->db->get_where('catalog', array('num'=>$id));
            $this->db->update('catalog', array("status" => 0), array('num'=>$id));
	}

	function update_post_by_id($data,$id)
	{
		$this->db->update('catalog', $data, array('num' => $id));
	}	

	function update_post_meta($data,$id,$key)
	{
		$this->db->update('post_meta',$data,array('post_id'=>$id,'key'=>$key));
	}

	function insert_post_meta($data)
	{
		$this->db->insert('post_meta',$data);
	}

	function get_all_post_based_on_user_type($start,$limit,$order_by='num',$order_type='asc')
	{
		if($this->input->post('key')!='')
		{
			$this->db->like('title',$this->input->post('key'));
		}
		
		if(!is_admin())
			$this->db->where('author',$this->session->userdata('user_id'));

		$this->db->order_by($order_by, "desc");
		$this->db->where('status !=',0);
                $this->db->where('temporary =',0);
		if($start=='all')
		{
			$query = $this->db->get('catalog');
			return $query;			
		}
		elseif ($start=='total') 
		{
			$query = $this->db->get('catalog');
			return $query->num_rows();			
		}
		else
		{
			$query = $this->db->get('catalog',$limit,$start);
			return $query;			
		}	
	}


	#**************** location functions start ******************#
	function get_location_id_by_name($name,$type,$parent)
	{
		$query = $this->db->get_where('locations',array('status'=>1,'name'=>$name,'type'=>$type,'parent'=>$parent));
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
			$data['parent']	= $parent;
			$this->db->insert('locations',$data);
			return $this->db->insert_id();
		}
	}

	function get_locations_json($term='',$type,$parent)
	{
		$this->db->like('name',$term);
		$query = $this->db->get_where('locations',array('status'=>1,'type'=>$type,'parent'=>$parent));
		$data = array();
		foreach ($query->result() as $row) {
			$val = array();
			$val['id'] = $row->id;
			$val['label'] = $row->name;
			$val['value'] = trim($row->name);
			array_push($data,$val);
		}
		return $data;
	}

	function get_all_locations_json($term='')
	{
		$this->db->like('name',$term);
		$query = $this->db->get_where('locations',array('status'=>1));
		$data = array();
		foreach ($query->result() as $row) {
			$val = array();
			$val['id'] = $row->id;
			$val['label'] = $row->name;
			$val['value'] = trim($row->name);
			array_push($data,$val);
		}
		return $data;
	}

	function get_all_locations_by_parent($parent='')
	{
		$query = $this->db->get_where('locations',array('parent'=>$parent,'status'=>1));		
		return $query;
	}

	function get_all_locations($start,$limit)
	{
		$this->db->order_by('parent','asc');
		if($this->input->post('key')!='')
		{
			$this->db->like('name',$this->input->post('key'));
		}

		if($start=='all')
		{
			$query = $this->db->get_where('locations',array('status'=>1));
			return $query;			
		}
		elseif($start=='total')
		{
			$query = $this->db->get_where('locations',array('status'=>1));
			return $query->num_rows();						
		}
		else
		{
			$query = $this->db->get_where('locations',array('status'=>1),$limit,$start);
			return $query;						
		}
	}

	function get_all_locations_by_range($start,$sort_by='id')
	{
		$data = array();
		$this->db->order_by($sort_by, "asc");

		$state_active = get_settings('classified_settings', 'show_state_province', 'yes');


		$this->db->where('status',1);
		$this->db->where('parent',0);
		$query = $this->db->get('locations');
		if($state_active == 'yes'){
			foreach ($query->result() as $country) {
				array_push($data,$country);
				$state_query = $this->db->get_where('locations',array('status'=>1,'parent'=>$country->id));
				foreach ($state_query->result() as $state) {
					array_push($data,$state);
					$city_query = $this->db->get_where('locations',array('status'=>1,'parent'=>$state->id));
					foreach ($city_query->result() as $city) {
						array_push($data,$city);
					}
				}
			}
		}
		else
		{
			foreach ($query->result() as $country) {
				array_push($data,$country);
				$city_query = $this->db->get_where('locations',array('status'=>1,'parent_country'=>$country->id, 'type'=> 'city'));
				foreach ($city_query->result() as $city) {
					array_push($data,$city);
				}
			}
		}


			return array_slice($data,$start);
	}
	
	
	function insert_location($data)
	{
		$this->db->insert('locations',$data);
		return $this->db->insert_id();
	}

	function get_locations_by_type($type)
	{
		$query = $this->db->get_where('locations',array('type'=>$type,'status'=>1));
		return $query;
	}

	function get_location_by_id($id)
	{
		$query = $this->db->get_where('locations',array('id'=>$id));
		if($query->num_rows()<=0)
		{
			echo 'Invalid page id';die;
		}
		else
		{
			return $query->row();
		}
	}

	function delete_location_by_id($id)
	{
		$this->db->where('id', $id);
		$this->db->or_where('parent', $id);
		$this->db->or_where('parent_country', $id);
		$this->db->delete('locations'); 
	}


	function update_location($data,$id)
	{
		$this->db->update('locations',$data,array('id'=>$id));
	}

	#************* location function end ******************#


	function get_feature_payment_data_by_unique_id($unique_id)
	{
		$this->db->where('key','featurepayment_'.$unique_id);
		$query = $this->db->get_where('post_meta',array('status'=>1));
		return $query;
	}

	#************ email function start *****************#
	function get_all_emails_admin($start,$limit='')
	{
		if(!is_admin())
			$this->db->where('user_id',$this->session->userdata('user_id'));

		if($start=='all')
		{
			$this->db->like('key','query_email');
			$query = $this->db->get_where('user_meta',array('status'=>1));
			return $query;	
		}
		elseif($start=='total')
		{
			$this->db->like('key','query_email');
			$query = $this->db->get_where('user_meta',array('status'=>1));
			return $query->num_rows();				
		}
		else
		{
			$this->db->like('key','query_email');
			$query = $this->db->get_where('user_meta',array('status'=>1),$limit,$start);
			return $query;			
		}
	}

	function get_all_emails()
	{
		if(!is_admin())
			$this->db->where('user_id',$this->session->userdata('user_id'));

		$this->db->like('key','query_email');
		$query = $this->db->get_where('user_meta',array('status'=>1));
		return $query;
	}
	#************ email function start *****************#



    /*start get all property for site map*/
    function get_all_estates_admin($start,$limit,$order_by='id',$order_type='asc')
    {

        if($this->session->userdata('filter_purpose')!='')
        {
            $this->db->where('purpose',$this->session->userdata('filter_purpose'));
        }

        if($this->session->userdata('filter_type')!='')
        {
            $this->db->where('type',$this->session->userdata('filter_type'));
        }

        if($this->session->userdata('filter_condition')!='')
        {
            $this->db->where('estate_condition',$this->session->userdata('filter_condition'));
        }

        if($this->session->userdata('filter_status')!='')
        {
            $this->db->where('status',$this->session->userdata('filter_status'));
        }
        else
        {
            $where = "(status=1 or status=2)";
            $this->db->where($where);
        }

        if($this->session->userdata('filter_orderby')!='')
        {
            $order_by 	= ($this->session->userdata('filter_orderby')!='')?$this->session->userdata('filter_orderby'):'id';
            $order_type = ($this->session->userdata('filter_ordertype')!='')?$this->session->userdata('filter_ordertype'):'DESC';
            $this->db->order_by($order_by,$order_type);
        }
        else
        {
            $this->db->order_by('id','desc');
        }

        if($this->input->post('id_search')!='')
            $this->db->where('id',$this->input->post('id_search'));


        $query = $this->db->get('posts',$limit,$start);
        /*echo $this->db->last_query();
        die;*/
        return $query;
    }
    /*end get all property for site map */

    function get_all_transaction() {
    	$this->db->where('status',1);
    	$this->db->where('amount >',0);
    	return $this->db->get('post_package');	
    }

    function delete_transaction($unique_id) {
    	$this->db->where('unique_id',$unique_id);
    	$this->db->set('status',0);
    	$this->db->update('post_package');
    }

    function clear_bulk_email()
    {
    	$this->db->like('key','query_email');
    	$this->db->delete('user_meta');
    }
    
    function csvimport($file){
        global $property_form_data, $client_form_data;
        
        $uploaded_file = $file;
        $row = 1;
        $response = "";
        $array_keys = array();
        $array_vals_tmp = array();
        $array_vals = array();

        try{
            if (($handle = fopen($uploaded_file, "r")) !== FALSE){
                //if ($_FILES['file']['type'] != "text/csv" && $_FILES['file']['type'] != "application/octet-stream")
                    //throw new Exception("Wrong file type", 403);

                while (($data = fgetcsv($handle, 0, ",")) !== FALSE){
                    $num = count($data);
                    $array_vals_tmp = array();

                    for ($c = 0; $c < $num; $c++){
                        if ($row === 1)
                            array_push($array_keys, $data[$c]);
                        else $array_vals_tmp[$array_keys[$c]] = $data[$c];
                    }

                    array_push($array_vals, $array_vals_tmp);
                    $row++;
                }

                fclose($handle);
            }
            else throw new Exception("Error opening file", 403);
        }
        catch (Exception $e){
            $response = array('error' => array('code' => $e->getCode(), 'description' => $e->getMessage()));
        }
        
        $all_errors = array();
        $all_items = array();
        
        for ($i = 1; $i < count($array_vals); $i++){
            $item = array(
                "type" => 1,
                "status" => 1,
                "auction" => 0,
                "photo" => "",
                "author" => 1,
                "metro" => 0,
                "temporary" => 0,
                "period" => 604800,
                "token" => "",
                "timestamp" => time()
            );
            $row_errors = array();

            foreach ($array_vals[$i] as $key => $val){ // перебираем поля недвижимости 
                if ($val != "NULL"){
                    if (strlen($val) === 0){
                        $error = array();
                        $error["string"] = $i;
                        $error["key"] = $key;
                        array_push($row_errors, $error);
                    }
                    else{
                        switch ($key) {
                            case "condition":
                                $item[$key] = $val == "Новый" ? 1 : 2;
                            break;
                            case "photo":
                                $arr = explode(",", $val);
                                $result = "[";
                                
                                for ($z = 0; $z < count($arr); $z++){
                                    $result .= ($z === 0 ? "" : ",").'"'.trim($arr[$z]).'"';
                                }
                                
                                $item[$key] = $result."]";
                            break;
                            case "auction":
                                $item[$key] = $val == "Да" ? 1 : 0;
                            break;
                            case "currency":
                                $this->db->select("code");
                                $this->db->where("symbol = ", $val);
                                $query = $this->db->get("currency");
                                $row = $query->result();

                                if (count($row) > 0){
                                    $item[$key] = $row[0]->code;
                                }
                                else{
                                    $error["string"] = $i;
                                    $error["key"] = $key.", ошибка в написании валюты";
                                    array_push($row_errors, $error);
                                }
                            break;
                            case "city":
                                $this->db->select("city_code");
                                $this->db->where("city_name = ", $val);
                                $query = $this->db->get("city");
                                $row = $query->result();

                                if (count($row) > 0){
                                    $item[$key] = $row[0]->city_code;
                                }
                                else{
                                    $error["string"] = $i;
                                    $error["key"] = $key.", ошибка в написании города";
                                    array_push($row_errors, $error);
                                }
                            break;
                             case "region":
                                $this->db->select("region_code");
                                $this->db->where("region_name = ", $val);
                                $query = $this->db->get("region");
                                $row = $query->result();

                                if (count($row) > 0){
                                    $item[$key] = $row[0]->region_code;
                                }
                                else{
                                    $error["string"] = $i;
                                    $error["key"] = $key.", ошибка в написании региона";
                                    array_push($row_errors, $error);
                                }
                            break;
                            case "category_code":
                                $this->db->select("category_code");
                                $this->db->where("category_name = ", $this->cleanString($val));
                                $query = $this->db->get("category");
                                $row = $query->result();

                                if (count($row) > 0){
                                    $item[$key] = $row[0]->category_code;
                                }
                                else{
                                    $error["string"] = $i;
                                    $error["key"] = $key.", ошибка в написании категории: ".$val;
                                    array_push($row_errors, $error);
                                }
                            break;
                            case "subcategory_code":
                                $this->db->select("subcategory_code");
                                $this->db->where("subcategory_name = ", $this->cleanString($val));
                                $this->db->where("category_code = ", $item["category_code"]);
                                $query = $this->db->get("subcategory");
                                $row = $query->result();
                                
                                if (count($row) > 0){
                                    $item[$key] = $row[0]->subcategory_code;
                                }
                                else{
                                    $error["string"] = $i;
                                    $error["key"] = $key.", ошибка в написании суб-категории: ".$val;
                                    array_push($row_errors, $error);
                                }
                            break;
                            case "advsubcategory_code":
                                $query = $this->db->query("SELECT advsubcategory_code FROM advsubcategory WHERE advsubcategory_name = '".$val."' AND subcategory_code = ".$item["subcategory_code"]." AND category_code = ".$item["category_code"].";");
                                //$this->db->select("advsubcategory_code");
                                //$this->db->where("advsubcategory_name = ", $val);
                                //$this->db->where("subcategory_code = ", $item["subcategory_code"]);
                                //$this->db->where("category_code = ", $item["category_code"]);
                                //$query = $this->db->get("advsubcategory");
                                $row = $query->result();
                                //echo var_dump($row);
                                if (count($row) > 0){
                                    $item[$key] = $row[0]->advsubcategory_code;
                                }
                                else{
                                    $error["string"] = $i;
                                    $error["key"] = $key.", ошибка в написании дополнительной суб-категории: ".$val;
                                    array_push($row_errors, $error);
                                }
                            break;
                            default:
                                $item[$key] = $val;
                            break;
                        }
                    }
                }
            }
            
            if (count($row_errors) > 0){
                array_push($all_errors, $row_errors);
            }
            
            array_push($all_items, $item);
        }
        
        if (count($all_errors) > 0){
            $response = "Ошибки в файле:";
            
            for ($i = 0; $i < count($all_errors); $i++){
                for ($m = 0; $m < count($all_errors[$i]); $m++){
                    $response .= "<br>Строка: ".$all_errors[$i][$m]["string"].", Ключ: ".$all_errors[$i][$m]["key"];
                }
            }
        }
        else{
            //var_dump($all_items);
            
            for ($i = 0; $i < count($all_items); $i++){
                $this->db->insert('catalog', $all_items[$i]);
            }
            
            $response = "Ошибки в файле отсутствуют. Загрузка завершена успешно.";
        }
        
        return "<div>".$response."</div>";
    }
    
    function cleanString($string){
        //$string = str_replace(' ', '-', $string); // Replaces all spaces with hyphens.

        return preg_replace('/[^АаБбВвГгДдЕеЁёЖжЗзИиЙйКкЛлМмНнОоПпРрСсТтУуФфХхЦцЧчШшЩщЪъЫыЬьЭэЮюЯя\s]/', '', trim($string)); // Removes special chars.
    }
    
    function convert1252($str) {
        return iconv( "Windows-1252", "UTF-8", $str );
    }
}

/* End of file category_model_core.php */
/* Location: ./system/application/models/category_model_core.php */