<?php
namespace classes;

class Reservation
{
    private $startDate;
    private $endDate;
    private $guest;

    function __construct($startDate, $endDate, Guest $guest)
    {
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->guest = $guest;
    }

    function __toString()
    {
        return "Reservation:" . $this->getStartDate() . " to " . $this->getEndDate() . ", Guest: " . $this->getGuest() . toString() . "\"";
    }

    public function getStartDate()
    {
        return $this->startDate;
    }

    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    public function getEndDate()
    {
        return $this->endDate;
    }

    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    public function getGuest()
    {
        return $this->guest;
    }

    public function setGuest($guest)
    {
        $this->guest = $guest;
    }
} 