<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

use settergetter\setter_getter_kajian as SetGetKajian;
//use Illuminate\Support\Facades\DB;

/**
 * Crud Kajian
 */
class Crud_kajian extends SetGetKajian
{
    
    /**
     * Get latest kajian
     *
     * @return Response
     */
    public function latest($limit, $offset)
    {
        /*
        $count_findKajian = Kajian::with('lokasi', 'ustadz')->dataKajianLatest($this->getTanggal(), $this->getStarttime(), $this->getEndtime())->get();
        
        $findKajian = Kajian::with('lokasi', 'ustadz')
                        ->dataKajianLatest($this->getTanggal(), $this->getStarttime(), $this->getEndtime())
                        ->take($limit)
                        ->offset($offset)
                        //->orderBy('tanggal', 'desc')
                        //->orderBy('starttime', 'asc')
                        ->get();
        
        return array(
            'status' => true,
            'count' => count($count_findKajian),
            'content' => $findKajian
        );
        */
    }
    
    /**
     * Get search kajian
     *
     * @return Response
     */
    public function search($limit, $offset, $params)
    {
        
        $count_findKajian = Kajian::with('lokasi', 'ustadz')
                            ->filter($params)
                            ->status()
                            ->get();
                            
        $findKajianQuery = Kajian::with('lokasi', 'ustadz')
                            ->select('kajian.*')
                            ->join('lokasi', 'lokasi.id', '=', 'kajian.lokasi_id')
                            ->selectRaw('calculate_distance_location2(lokasi.latitude, lokasi.longitude, ' . $params['latitude'] .',' . $params['longitude'] . ') as distance')
                            ->filter($params)
                            ->status()
                            ->take($limit)
                            ->offset($offset);

        if($params['orderby']=='time'){
            $findKajianQuery->orderBy('tanggal', 'desc')
                ->orderBy('starttime', 'asc');
            $findKajianQuery->orderBy('distance', 'asc');
        } else if($params['orderby']=='distance'){
            $findKajianQuery->orderBy('distance', 'asc');
            $findKajianQuery->orderBy('tanggal', 'desc')
                ->orderBy('starttime', 'asc');
        }   
    
        $findKajian = $findKajianQuery->get();
        
        return array(
            'status' => true,
            'count' => count($count_findKajian),
            'content' => $findKajian
        );
    }



    /**
     * Get detail kajian
     *
     * @return Response
     */
    public function detail($id)
    {
        
        $findKajian = Kajian::with('lokasi', 'ustadz')
                            ->detailKajian($id)
                            ->status()
                            ->get();
        
        return array(
            'status' => true,
            'content' => $findKajian
        );
    }
    
}

/* End of file crud_kajian.php */
/* Location: ./application/libraries/crud/crud_kajian.php */
