<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('set_offset')) {
    function set_offset($current_page, $limit)
    {
        
        $value_offset = is_null($current_page) ? 0 : $limit * ($current_page - 1);
        return $value_offset;
    }
}


/* End of file offset_helper.php */
/* Location: ./application/helpers/offset_helper.php */