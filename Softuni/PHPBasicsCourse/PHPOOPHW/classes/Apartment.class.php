<?php
namespace classes;

class Apartment extends Room
{
    function __construct(
        $roomNumber,
        $price,
        $reservations = [],
        $roomType = RoomType::Diamond,
        $bedCount = 4,
        $extras = ["TV", "air-conditioner", "refrigerator", "mini-bar", "bathtub", "kitchen box", "free Wi-Fi"],
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