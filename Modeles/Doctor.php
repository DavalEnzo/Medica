<?php

namespace AirTable\Modeles;

class Doctor
{
    protected ?int $id = null;
    protected ?string $idAirTable = null;
    protected ?string $firstname = null;
    protected ?string $lastname = null;
    protected ?array $jobs = [];

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getIdAirTable(): ?string
    {
        return $this->idAirTable;
    }

    /**
     * @param string|null $idAirTable
     */
    public function setIdAirTable(?string $idAirTable): void
    {
        $this->idAirTable = $idAirTable;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return array|null
     */
    public function getJobs(): ?array
    {
        return $this->jobs;
    }

    /**
     * @param array|null $jobs
     */
    public function setJobs(?array $jobs): void
    {
        $this->jobs = $jobs;
    }
}
