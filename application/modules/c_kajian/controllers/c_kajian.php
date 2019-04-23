<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_kajian extends MX_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT+7');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        
        $this->load->config('salim_config');
        $this->load->library('crud/crud_kajian');
        $this->load->helper('offset');
        $this->load->helper('jesen');
    }
    
    function latest()
    {
        try {
            
            // set data get kajian
            $this->crud_kajian->setStarttime($this->config->item('parameter_default_get_kajian_latest')['starttime']);
            $this->crud_kajian->setEndtime($this->config->item('parameter_default_get_kajian_latest')['endtime']);
            $this->crud_kajian->setTanggal($this->config->item('parameter_default_get_kajian_latest')['tanggal']);
            
            // set limit & offset
            $limit        = $this->config->item('limit_default_get_kajian_latest');
            $current_page = $this->input->post('page_num');
            $offset       = set_offset($current_page, $limit);
            
            // searching data pencarian
            $result = $this->crud_kajian->latest($limit, $offset);
            
        }
        catch (Exception $e) {
            
            $message = isJson($e->getMessage()) ? json_decode($e->getMessage()) : $e->getMessage();
            
            $result = array(
                'status' => FALSE,
                'message' => $message
            );
        }
        
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
    
    function search()
    {
        
        $this->load->module('sesshon');
        
        try {
            
            $all_request = array_map('trim', $_POST);
            
            foreach ($all_request as $key => $value) {
                
                if ($key != 'page_num') {
                    if (is_null($value) || $value == "")
                        unset($all_request[$key]);
                }
            }
            
            // Validate & Sanitize post data
            $this->load->library('lib_gump');
            $this->lib_gump->execute($this->config->item('validation_rules_search_kajian'), $this->config->item('filter_rules_search_kajian'));
            
            if (count($all_request) > 0) {
                
                // set limit & offset
                $limit        = $this->config->item('limit_default_get_kajian_latest');
                $current_page = $this->input->post('page_num');
                $offset       = set_offset($current_page, $limit);
                
                $parameter_search = $offset > 0 ? $this->session->userdata('parameter_search') : $all_request;


                
                // result searching data kajian
                $result = $this->crud_kajian->search($limit, $offset, $parameter_search);

                //print_r($result);
                //exit(1);
                
                if ($result['count'] > 0) {
                    
                    // hapus session data search
                    $this->session->unset_userdata('parameter_search');
                    
                    // create new data search in session
                    $this->sesshon->create_parameter_search($parameter_search);
                }
                
            } else {
                
                throw new Exception('Kolom filter pencarian minimal diisi 1 kolom');
            }
            
        }
        catch (Exception $e) {
            
            $message = isJson($e->getMessage()) ? json_decode($e->getMessage()) : $e->getMessage();
            
            $result = array(
                'status' => FALSE,
                'message' => $message
            );
        }
        
        $this->output->set_content_type('application/json')->set_output(json_encode($result));
    }
    
}

/* End of file c_kajian.php */
/* Location: ./application/modules/c_kajian/controllers/c_kajian.php */