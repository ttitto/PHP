<?php

namespace classes;

abstract class Room implements iReservable
{
    private $reservations;
    private $roomType;
    private $hasRestroom;
    private $hasBalcony;
    private $bedCount;
    private $roomNumber;
    private $extras;
    private $price;

    function __construct(
        $reservations,
        $price,
        $roomType,
        $roomNumber,
        $bedCount,
        $extras = [],
        $hasBalcony = false,
        $hasRestroom = false)
    {
        $this->setReservations($reservations);
        $this->setBedCount($bedCount);
        $this->setExtras($extras);
        $this->setHasBalcony($hasBalcony);
        $this->setHasRestroom($hasRestroom);
        $this->setPrice($price);
        $this->setRoomType($roomType);
        $this->setRoomNumber($roomNumber);
    }

    private function setReservations($reservations)
    {
        $this->reservations = $reservations;
    }

    function addReservation($reservation)
    {
        $arr = $this->getReservations();
        $arr[] = $reservation;
        $this->setReservations($arr);
    }

    public function getReservations()
    {
        return $this->reservations;
    }

    function removeReservation($reservation)
    {
        $this->setReservations(array_diff($this->getReservations(), array($reservation)));
    }

    function __toString()
    {
        $roomStr = get_class($this) .
            ": Room number: " . $this->getRoomNumber() .
            " type: " . $this->getRoomType() .
            " Beds: " . $this->getBedCount() .
            " has balcony: " . ($this->getHasBalcony() ? "yes" : "no") .
            " has restroom:  " . ($this->getHasRestroom() ? "yes" : "no") .
            " extras: [" . implode(', ', $this->getExtras()) . "]" .
            " Price: " . $this->getPrice() .
            "<br>Reservations:<br>" . implode('', $this->getReservations());

        return $roomStr;
    }

    public function getRoomNumber()
    {
        return $this->roomNumber;
    }

    public function setRoomNumber($roomNumber)
    {
        $this->roomNumber = $roomNumber;
    }

    public function getRoomType()
    {
        return $this->roomType;
    }

    public function setRoomType($roomType)
    {
        $this->roomType = $roomType;
    }

    public function getBedCount()
    {
        return $this->bedCount;
    }

    public function setBedCount($bedCount)
    {
        $this->bedCount = $bedCount;
    }

    public function getHasBalcony()
    {
        return $this->hasBalcony;
    }

    public function setHasBalcony($hasBalcony)
    {
        $this->hasBalcony = $hasBalcony;
    }

    public function getHasRestroom()
    {
        return $this->hasRestroom;
    }

    public function setHasRestroom($hasRestroom)
    {
        $this->hasRestroom = $hasRestroom;
    }

    public function getExtras()
    {
        return $this->extras;
    }

    public function setExtras($extras)
    {
        $this->extras = $extras;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }
}