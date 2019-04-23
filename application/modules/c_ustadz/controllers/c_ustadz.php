<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class C_ustadz extends MX_Controller
{
    
    public function __construct()
    {
        parent::__construct();
        
        $this->output->set_header('Last-Modified:' . gmdate('D, d M Y H:i:s') . 'GMT+7');
        $this->output->set_header('Cache-Control: no-store, no-cache, must-revalidate');
        $this->output->set_header('Cache-Control: post-check=0, pre-check=0', false);
        $this->output->set_header('Pragma: no-cache');
    }
    
    function listData() 
    {

        $this->load->database();
        $this->load->library('Datatables');
        $this->datatables->select('id,name')->from('ustadz')->where('status', 'approved');
        $this->output->set_content_type('application/json')->set_output($this->datatables->generate());
    }
   
}

/* End of file c_ustadz.php */
/* Location: ./application/modules/c_ustadz/controllers/c_ustadz.php */