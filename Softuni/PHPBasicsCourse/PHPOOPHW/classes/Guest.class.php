<?php

namespace classes;

class Guest
{
    private $firstName;
    private $lastName;
    private $id;

    function __construct($firstName, $lastName, $id)
    {
        $this->getFirstName($firstName);
        $this->getId($id);
        $this->getLastName($lastName);
    }

    public function getFirstName()
    {
        return $this->firstName;
    }

    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getLastName()
    {
        return $this->lastName;
    }

    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    function __toString()
    {
        return "Guest: " . $this->getId() . ": " . $this->getFirstName() . " " . $this->getLastName();
    }
}