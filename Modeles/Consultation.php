<?php

namespace AirTable\Modeles;

class Consultation
{
    protected int $id;
    protected string $date;
    protected array $firstname = [];
    protected array $lastname = [];
    protected array $diseases = [];
    protected array $doctorName = [];

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getDate(): string
    {
        return $this->date;
    }

    /**
     * @param string $date
     */
    public function setDate(string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return array
     */
    public function getFirstname(): array
    {
        return $this->firstname;
    }

    /**
     * @param array $firstname
     */
    public function setFirstname(array $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return array
     */
    public function getLastname(): array
    {
        return $this->lastname;
    }

    /**
     * @param array $lastname
     */
    public function setLastname(array $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return array
     */
    public function getDiseases(): array
    {
        return $this->diseases;
    }

    /**
     * @param array $diseases
     */
    public function setDiseases(array $diseases): void
    {
        $this->diseases = $diseases;
    }

    /**
     * @return array
     */
    public function getDoctorName(): array
    {
        return $this->doctorName;
    }

    /**
     * @param array $doctorName
     */
    public function setDoctorName(array $doctorName): void
    {
        $this->doctorName = $doctorName;
    }
}
