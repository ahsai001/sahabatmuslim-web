<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class C_detail_kajian extends MX_Controller {

	public function __construct()
	{
		parent::__construct();

		$this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT+7');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');

        $this->load->config('salim_config');
        $this->load->library('crud/crud_kajian');
		$this->load->helper('url');
	}

	public function detail(){
		try{
			// config path assets
			$data['path_realestate'] 	= $this->config->item('assets_realestate');
			$data['path_app'] 			= $this->config->item('assets_app');
			$data['path_gif'] 			= $this->config->item('assets_gif');
			$data['path_gmaps'] 		= $this->config->item('assets_gmaps');
			$data['path_clockpicker'] 	= $this->config->item('assets_clockpicker');
			$data['path_datepicker'] 	= $this->config->item('assets_datepicker');
			$data['path_datatables'] 	= $this->config->item('assets_datatables');
			$data['path_bootbox'] 		= $this->config->item('assets_bootbox');
			$data['path_powerange'] 	= $this->config->item('assets_powerange');
			$data['path_toastr']		= $this->config->item('assets_toastr');
			$data['path_ssk'] 			= $this->config->item('assets_ssk');

			// link get, search kajian & check data search in session
			$data['link_get_kajian_latest'] 					= $this->config->item('url_get_kajian_latest');
			$data['link_search_kajian'] 						= $this->config->item('url_search_kajian');
			$data['link_check_data_search_kajian_in_session'] 	= $this->config->item('url_check_data_search_kajian_in_session');
			$data['link_list_ustadz']="";
			$data['link_list_lokasi']="";

			// searching data pencarian
			$result = $this->crud_kajian->detail($this->uri->segment(2)); //using route 2, without route 4
			
			//var_dump($result);exit();

			if(empty($result['content'])){
				$data['content'] = "No Data";
			}else{
				$data['content'] = $result['content'][0];
			}

		} catch (Exception $e) {
            $message = isJson($e->getMessage()) ? json_decode($e->getMessage()) : $e->getMessage();
			$data['content'] = $message;
        }
        
        //$this->output->set_content_type('application/json')->set_output(json_encode($result));
		$this->load->view('view_detail_kajian', $data);
	}

}

/* End of file welcome.php */
/* Location: ./application/modules/welcome/controllers/welcome.php */
