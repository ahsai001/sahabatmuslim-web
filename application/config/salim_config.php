<?php
if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use Carbon\Carbon;
$dt = Carbon::now('Asia/Jakarta');

/*
|--------------------------------------------------------------------------
| config path assets
|--------------------------------------------------------------------------
|
*/

$config['assets_app'] = base_url() . 'assets/app/';
$config['assets_bootbox'] = base_url() . 'assets/bootbox/';
$config['assets_clockpicker'] = base_url() . 'assets/clockpicker/';
$config['assets_datepicker'] = base_url() . 'assets/datepicker/';
$config['assets_gif'] = base_url() . 'assets/gif/';
$config['assets_gmaps'] = base_url() . 'assets/gmaps/';
$config['assets_realestate'] = base_url() . 'assets/realestate/';
$config['assets_datatables'] = base_url() . 'assets/datatables/';
$config['assets_powerange'] = base_url() . 'assets/powerange/';
$config['assets_toastr'] = base_url() . 'assets/toastr/';
$config['assets_ssk'] = base_url() . 'assets/ssk/';
/*
|--------------------------------------------------------------------------
| config ustad & lokasi list
|--------------------------------------------------------------------------
|
*/

$config['lokasi_list'] = site_url() . 'lokasilist';
$config['ustadz_list'] = site_url() . 'ustadzlist';

/*
|--------------------------------------------------------------------------
| config link check session
|--------------------------------------------------------------------------
|
*/

$config['url_check_data_search_kajian_in_session'] = site_url() . 'check';

/*
|--------------------------------------------------------------------------
| config default get kajian latest
|--------------------------------------------------------------------------
|
*/

$config['url_get_kajian_latest'] = site_url() . 'latest';

$config['parameter_default_get_kajian_latest'] = array(
    'starttime' => '00:00:00',
    'endtime' => '23:59:00',
    'tanggal' => $dt->toDateString()
);

$config['limit_default_get_kajian_latest'] = 5;

/*
|--------------------------------------------------------------------------
| config link search kajian
|--------------------------------------------------------------------------
|
*/

$config['url_search_kajian'] = site_url() . 'search';
$config['limit_search_kajian'] = 5;


/*
|--------------------------------------------------------------------------
| config validation input
|--------------------------------------------------------------------------
|
*/

# validation search kajian
$config['validation_rules_search_kajian'] = array(
    'tanggal' => 'date',
    'starttime' => 'valid_time_hhmm',
    'endtime' => 'valid_time_hhmm',
    'distance' => 'integer'
);

$config['filter_rules_search_kajian'] = array(
    'title' => 'trim|sanitize_string',
    'ustadz' => 'trim|sanitize_string',
    'place' => 'trim|sanitize_string',
    'tanggal' => 'trim|sanitize_string',
    'starttime' => 'trim|sanitize_string',
    'endtime' => 'trim|sanitize_string',
    'distance' => 'trim|sanitize_string'
);

/* End of file salim_config.php */
/* Location: ./application/config/salim_config.php */