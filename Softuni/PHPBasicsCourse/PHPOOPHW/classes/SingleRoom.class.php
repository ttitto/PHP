<?php

namespace classes;

class SingleRoom extends Room
{
    function __construct(
        $roomNumber,
        $price,
        $reservations = [],
        $roomType = RoomType::Standard,
        $bedCount = 1,
        $extras = ["TV", "air-conditioner"],
        $hasBalcony = false,
        $hasRestroom = true)
    {
        parent::__construct($reservations,
            $price,
            $roomType,
            $roomNumber,
            $bedCount,
            $extras,
            $hasBalcony,
            $hasRestroom);
    }
}