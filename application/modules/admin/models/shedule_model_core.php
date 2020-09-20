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
class Shedule_model_core extends CI_Model{
    function __construct(){
        parent::__construct();
        $this->load->database();
        $this->load->model('admin/system_model');
        $this->load->model('options_model');
    }
    
    function csvimport($filename){
        $uploaded_file = $filename;
        $row = 1;
        $new_content = "";
        $response = "";
        $array_keys = array();
        $array_vals_tmp = array();
        $array_vals = array();
        $settings = $this->options_model->getvalues("csvloader_settings");
        $rows_to_load = $settings->count;
        
        if ($settings->is_grad == 1){
            exit("Exit: not gradually");
        }
        
        try{
            if (($handle = fopen($uploaded_file, "r")) !== FALSE){
                //if ($_FILES['file']['type'] != "text/csv" && $_FILES['file']['type'] != "application/octet-stream")
                    //throw new Exception("Wrong file type", 403);

                while (($data = fgetcsv($handle, 0, ",")) !== FALSE){
                    $num = count($data);
                    $array_vals_tmp = array();

                    for ($c = 0; $c < $num; $c++){
                        if ($row === 1){
                            array_push($array_keys, $data[$c]);
                            $new_content .= $data[$c].($c < $num-1 ? "," : "\n");
                        }
                        else{
                            if ($row <= 2){//$rows_to_load){
                                $array_vals_tmp[$array_keys[$c]] = $data[$c];
                            }
                            else{
                                $new_content .= ($c === 3 ? '"'.$data[$c].'"' : $data[$c]).($c < $num-1 ? "," : "\n");
                            }
                        }
                    }
                    
                    if ($row <= 2){//$rows_to_load){
                        array_push($array_vals, $array_vals_tmp);
                    }
                    
                    $row++;
                }

                echo $new_content;
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
                "timestamp" => time(),
                "csv" => 1
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
                                $this->db->where("category_name = ", $val);
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
                                $this->db->where("subcategory_name = ", $val);
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
            
            $this->db->order_by("timestamp", "desc");
            $this->db->where('csv', 1); 
            $query = $this->db->get('catalog');
            $last_timestamp = $query->result()[0]->timestamp;
            $time_passed = (time() - $last_timestamp)/60;
            $rand_minutes = rand(30/$rows_to_load, 60/$rows_to_load);
            
            $response .= $time_passed.", ".$rand_minutes;
            
            for ($i = 0; $i < count($all_items); $i++){
                if ($time_passed > $rand_minutes){
                    $this->db->insert('catalog', $all_items[$i]);
                    $handle2 = fopen("/home/c/cn79625/admin.1shekel.com/public_html/sandbox/catalog.csv", "w");
                    fwrite($handle2, $new_content);
                    fclose($handle2);
                }
            }

            $response .= "Ошибки в файле отсутствуют. Загрузка завершена успешно.";
        }

        return "<div>".$response."</div>";
    }
}