<?php

namespace classes;

interface iReservable
{
    function addReservation($reservation);

    function removeReservation($reservation);
} 