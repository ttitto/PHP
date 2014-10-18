<?php
namespace classes;

class Bedroom extends Room
{
    function __construct(
        $roomNumber,
        $price,
        $reservations = [],
        $roomType = RoomType::Gold,
        $bedCount = 2,
        $extras = ["TV", "air-conditioner", "refrigerator", "mini-bar", "bathtub"],
        $hasBalcony = true,
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