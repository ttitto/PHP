<?php
namespace classes;

class Reservation
{
    private $startDate;
    private $endDate;
    private $guest;

    function __construct($startDate, $endDate, Guest $guest)
    {
        $this->setStartDate($startDate);
        $this->setEndDate($endDate);
        $this->setGuest($guest);
    }

    function __toString()
    {
        return "Reservation:" . date("d.m.Y", $this->getStartDate()) . " to " . date("d.m.Y",
            $this->getEndDate()) . ",
        Guest: " . $this->getGuest() . "<br>";
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

    public function setGuest(Guest $guest)
    {
        $this->guest = $guest;
    }
} 