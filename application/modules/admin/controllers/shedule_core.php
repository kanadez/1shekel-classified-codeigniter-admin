<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * classified classified Controller
 *
 * This class handles only classified related functionality
 *
 * @package		Admin
 * @subpackage	classified
 * @author		dbcinfotech
 * @link		http://dbcinfotech.net
 */

class Shedule_core extends MX_Controller {
	public function __construct(){
            parent::__construct();
	}

	public function index(){
            echo "Shedule inited";
            $this->load->model('admin/shedule_model');
            echo $this->shedule_model->csvimport("http://admin.1shekel.com/sandbox/catalog.csv");
	}
}

/* End of file classified_core.php */
/* Location: ./application/modules/admin/controllers/classified_core.php */