<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('isJson')) {
    function isJson($setring)
    {
        return is_string($setring) && is_object(json_decode($setring)) && (json_last_error() == JSON_ERROR_NONE) ? true : false;
    }
}


/* End of file offset_helper.php */
/* Location: ./application/helpers/offset_helper.php */