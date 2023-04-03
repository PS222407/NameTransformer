<?php

namespace NameTransformer;

class Person
{
    private string $firstName;

    private ?string $insertion;

    private string $lastName;

    public function __construct(string $firstName, ?string $insertion, string $lastName)
    {
        $this->firstName = $firstName;
        $this->insertion = $insertion;
        $this->lastName = $lastName;
    }

    public function getFullName(): string
    {
        $fullName = $this->firstName;

        if ($this->insertion) $fullName .= " $this->insertion";
        if ($this->lastName) $fullName .= " $this->lastName";

        return $fullName;
    }

    public function getFirstName(): string
    {
        return $this->firstName;
    }

    public function getInsertion(): string
    {
        return $this->insertion;
    }

    public function getLastName(): string
    {
        return $this->lastName;
    }
}