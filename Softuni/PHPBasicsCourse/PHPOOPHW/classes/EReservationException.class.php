<?php
namespace classes;

class EReservationException extends \Exception
{
    function __construct($message, $code = null)
    {
        parent::__construct($message, $code);
    }
}