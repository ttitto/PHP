<?php

namespace classes;

class Guest
{
    private $firstName;
    private $lastName;
    private $id;

    function __construct($firstName, $lastName, $id)
    {
        $this->setFirstName($firstName);
        $this->setId($id);
        $this->setLastName($lastName);
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
        $str= ("Guest: " . $this->getId() . ": " . $this->getFirstName() . " " . $this->getLastName());
        return $str;
    }
}