<?php


namespace App\Services\DTO;


class OpeningDTO
{

    private $monday;
    private $tuesday;
    private $wednesday;
    private $thursday;
    private $friday;
    private $saturday;
    private $sunday;

    /**
     * OpeningDTO constructor.
     * @param $monday
     * @param $tuesday
     * @param $wednesday
     * @param $thursday
     * @param $friday
     * @param $saturday
     * @param $sunday
     */
    public function __construct($monday, $tuesday, $wednesday, $thursday, $friday, $saturday, $sunday)
    {
        $this->monday = $monday;
        $this->tuesday = $tuesday;
        $this->wednesday = $wednesday;
        $this->thursday = $thursday;
        $this->friday = $friday;
        $this->saturday = $saturday;
        $this->sunday = $sunday;
    }

    /**
     * @return mixed
     */
    public function getMonday()
    {
        return $this->monday;
    }

    /**
     * @return mixed
     */
    public function getTuesday()
    {
        return $this->tuesday;
    }

    /**
     * @return mixed
     */
    public function getWednesday()
    {
        return $this->wednesday;
    }

    /**
     * @return mixed
     */
    public function getThursday()
    {
        return $this->thursday;
    }

    /**
     * @return mixed
     */
    public function getFriday()
    {
        return $this->friday;
    }

    /**
     * @return mixed
     */
    public function getSaturday()
    {
        return $this->saturday;
    }

    /**
     * @return mixed
     */
    public function getSunday()
    {
        return $this->sunday;
    }

}
