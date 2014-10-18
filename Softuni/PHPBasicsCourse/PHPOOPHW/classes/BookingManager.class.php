<?php

namespace classes;

final class BookingManager
{
    static function bookRoom(Room $room, Reservation $reservation)
    {
        foreach ($room->getReservations() as $res) {
            if (($reservation->getStartDate() >= $res->getStartDate() && $reservation->getStartDate()
                    <= $res->getEndDate()) ||
                ( $reservation->getEndDate() <= $res->getEndDate() && $reservation->getEndDate() >=
            $res->getStartDate()) ||
                ($reservation->getStartDate() <= $res->getStartDate() && $reservation->getEndDate() >= $res->getEndDate())
            ) {
                throw new EReservationException("Room $room->getRoomNumber() is busy in that period");
            }
        }

        $room->addReservation($reservation);

        $guest = $reservation->getGuest();
        echo "Room <strong> " . $room->getRoomNumber() . "</strong> successfully booked for <strong>" .
            $guest->getFirstName() . " " . $guest->getLastName() .
            "</strong> from <time>" . date('d.m.Y', $reservation->getStartDate()) . "</time> to <time>"
            . date('d.m.Y', $reservation->getEndDate()) . "</time>.<br>";
    }
} 