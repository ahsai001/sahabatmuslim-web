<?php

namespace settergetter;

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Setter_getter_kajian
{

    private $title;
    private $ustadz;
    private $place;
    private $tanggal;
    private $starttime;
    private $endtime;
    private $startendtime;
    private $distance;
    private $info;
    


    /**
     * Gets the value of title.
     *
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Sets the value of title.
     *
     * @param mixed $title the title
     *
     * @return self
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Gets the value of ustadz.
     *
     * @return mixed
     */
    public function getUstadz()
    {
        return $this->ustadz;
    }

    /**
     * Sets the value of ustadz.
     *
     * @param mixed $ustadz the ustadz
     *
     * @return self
     */
    public function setUstadz($ustadz)
    {
        $this->ustadz = $ustadz;

        return $this;
    }

    /**
     * Gets the value of place.
     *
     * @return mixed
     */
    public function getPlace()
    {
        return $this->place;
    }

    /**
     * Sets the value of place.
     *
     * @param mixed $place the place
     *
     * @return self
     */
    public function setPlace($place)
    {
        $this->place = $place;

        return $this;
    }

    /**
     * Gets the value of tanggal.
     *
     * @return mixed
     */
    public function getTanggal()
    {
        return $this->tanggal;
    }

    /**
     * Sets the value of tanggal.
     *
     * @param mixed $tanggal the tanggal
     *
     * @return self
     */
    public function setTanggal($tanggal)
    {
        $this->tanggal = $tanggal;

        return $this;
    }

    /**
     * Gets the value of starttime.
     *
     * @return mixed
     */
    public function getStarttime()
    {
        return $this->starttime;
    }

    /**
     * Sets the value of starttime.
     *
     * @param mixed $starttime the starttime
     *
     * @return self
     */
    public function setStarttime($starttime)
    {
        $this->starttime = $starttime;

        return $this;
    }

    /**
     * Gets the value of endtime.
     *
     * @return mixed
     */
    public function getEndtime()
    {
        return $this->endtime;
    }

    /**
     * Sets the value of endtime.
     *
     * @param mixed $endtime the endtime
     *
     * @return self
     */
    public function setEndtime($endtime)
    {
        $this->endtime = $endtime;

        return $this;
    }




    /**
     * Gets the value of startendtime.
     *
     * @return mixed
     */
    public function getStartendtime()
    {
        return $this->startendtime;
    }

    /**
     * Sets the value of startendtime.
     *
     * @param mixed $startendtime the startendtime
     *
     * @return self
     */
    public function setStartendtime($startendtime)
    {
        $this->startendtime = $startendtime;

        return $this;
    }




    /**
     * Gets the value of distance.
     *
     * @return mixed
     */
    public function getDistance()
    {
        return $this->distance;
    }

    /**
     * Sets the value of distance.
     *
     * @param mixed $distance the distance
     *
     * @return self
     */
    public function setDistance($distance)
    {
        $this->distance = $distance;

        return $this;
    }



    /**
     * Gets the value of info.
     *
     * @return mixed
     */
    public function getInfo()
    {
        return $this->info;
    }
    
    /**
     * Sets the value of info.
     *
     * @param mixed $info the info
     *
     * @return self
     */
    public function setInfo($info)
    {
        $this->info = $info;
        
        return $this;
    }
}

/* End of file setter_getter_kajian.php */
/* Location: ./application/libraries/settergetter/setter_getter_kajian.php */