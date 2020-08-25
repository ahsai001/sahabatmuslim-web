<?php

defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Kajian Model
 */
class Kajian extends Illuminate\Database\Eloquent\Model
{
    protected $table = 'kajian';
    protected $hidden = ['user_id', 'ustadz_id', 'lokasi_id', 'created_at', 'updated_at'];
    
    /*
     * Relasi One-to-Many
     * =================
     * model 'Kajian' memiliki relasi One-to-Many (belongsTo) sebagai penerima 'ustadz_id'
     */
    public function ustadz()
    {
        return $this->belongsTo('Ustadz', 'ustadz_id');
    }
    
    /*
     * Relasi One-to-Many
     * =================
     * model 'Kajian' memiliki relasi One-to-Many (belongsTo) sebagai penerima 'lokasi_id'
     */
    public function lokasi()
    {
        return $this->belongsTo('Lokasi', 'lokasi_id');
    }
    
    /*
     * Relasi One-to-Many
     * =================
     * model 'Kajian' memiliki relasi One-to-Many (belongsTo) sebagai penerima 'user_id'
     */
    public function user()
    {
        return $this->belongsTo('User', 'user_id');
    }
    
    public function scopeDataKajianLatest($query, $tanggal, $starttime, $endtime)
    {
        
        return $query->where('status', '=', 'approved')->where('tanggal', '>=', $tanggal)->whereRaw("((ADDTIME('$starttime','00:01:00') BETWEEN starttime AND endtime) OR (starttime BETWEEN ADDTIME('$starttime','00:01:00') AND SUBTIME('$endtime','00:01:00')))");
    }
    
    public function scopeFilter($query, $params)
    {
        
        if (array_key_exists('title', $params)) {
            
            $query->where('title', 'like', '%' . $params['title'] . '%');
        }
        
        if (array_key_exists('ustadzid', $params)) {
            
            $query->whereHas('ustadz', function($q) use ($params)
            {
                $q->where('ustadz.id', '=', $params['ustadzid']);
            });
        }
        
        if (array_key_exists('placeid', $params)) {
            
            $query->whereHas('lokasi', function($q) use ($params)
            {
                $q->where('lokasi.id', '=', $params['placeid']);
            });
        }
        
        if (array_key_exists('tanggal', $params)) {
            
            $query->where('tanggal', '=', $params['tanggal']);
        }
        
        if (array_key_exists('starttime', $params) && array_key_exists('endtime', $params)) {
            
            $starttime = $params['starttime'];
            $endtime = $params['endtime'];
            $query->whereRaw("((ADDTIME('$starttime','00:01:00') BETWEEN starttime AND endtime) OR (starttime BETWEEN ADDTIME('$starttime','00:01:00') AND SUBTIME('$endtime','00:01:00')))");
        }
        
        if (array_key_exists('starttime', $params) && array_key_exists('endtime', $params) == FALSE) {
            
            //$query->where('starttime', '=', $params['starttime']);
            //$CI =& get_instance();
            $starttime = $params['starttime'];
            //$endtime = $CI->config->item('parameter_default_get_kajian_latest')['endtime']);
            $endtime = '23:59:00';
            $query->whereRaw("((ADDTIME('$starttime','00:01:00') BETWEEN starttime AND endtime) OR (starttime BETWEEN ADDTIME('$starttime','00:01:00') AND SUBTIME('$endtime','00:01:00')))");
        }
        
        if (array_key_exists('starttime', $params) == FALSE && array_key_exists('endtime', $params)) {
            
            //$query->where('endtime', '=', $params['endtime']);
            //$CI =& get_instance();
            //$starttime = $CI->config->item('parameter_default_get_kajian_latest')['starttime']);
            $starttime = '00:00:00';
            $endtime = $params['endtime'];
            $query->whereRaw("((ADDTIME('$starttime','00:01:00') BETWEEN starttime AND endtime) OR (starttime BETWEEN ADDTIME('$starttime','00:01:00') AND SUBTIME('$endtime','00:01:00')))");
        }
        
        if (array_key_exists('distance', $params) && array_key_exists('latitude', $params) && array_key_exists('longitude', $params)) {
            
            if (!array_key_exists('placeid', $params) || empty($params['placeid'])) {
                $query->whereHas('lokasi', function ($q) use ($params) 
                {
                    $q->whereRaw('calculate_distance_location2(latitude, longitude, ' . $params['latitude'] .',' . $params['longitude'] . ') < ' .$params['distance']);
                });
            }
        }
        return $query;
    }
    
    public function scopeStatus($query)
    {
        return $query->where('kajian.status', '=', 'approved');
    }

    public function scopeDetailKajian($query, $id){
        return $query->where('kajian.id', '=', $id);
    }
    
}

/* End of file Kajian.php */
/* Location: ./application/models/Kajian.php */
