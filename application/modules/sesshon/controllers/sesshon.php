<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Sesshon extends MX_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT+7');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
        
    }
    
    function check()
    {
        
        // check parameter searching in session
        $status_exist = array_key_exists('parameter_search', $this->session->all_userdata()) ? 'exist' : 'not exist';
        $this->output->set_content_type('application/json')->set_output(json_encode(array('status' => $status_exist)));
    }
    
    function create_parameter_search($all_request)
    {
        
        $parameter_search = array(
            'parameter_search' => $all_request
        );
        
        $this->session->set_userdata($parameter_search);
    }

    function tes() {

        print_r($this->session->all_userdata());
    }
}

/* End of file sesshon.php */
/* Location: ./application/modules/sesshon/controllers/sesshon.php */