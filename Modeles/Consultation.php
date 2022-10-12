<?php

namespace AirTable\Modeles;

class Consultation
{
    protected ?int $id = null;
    protected ?string $idAirTable = null;
    protected ?string $date = null;
    protected array $patientsFirstname = [];
    protected array $patientsLastname = [];
    protected array $diseases = [];
    protected array $doctorName = [];

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
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * @param string|null $date
     */
    public function setDate(?string $date): void
    {
        $this->date = $date;
    }

    /**
     * @return array
     */
    public function getPatientsFirstname(): array
    {
        return $this->patientsFirstname;
    }

    /**
     * @param array $patientsFirstname
     */
    public function setPatientsFirstname(array $patientsFirstname): void
    {
        $this->patientsFirstname = $patientsFirstname;
    }

    /**
     * @return array
     */
    public function getPatientsLastname(): array
    {
        return $this->patientsLastname;
    }

    /**
     * @param array $patientsLastname
     */
    public function setPatientsLastname(array $patientsLastname): void
    {
        $this->patientsLastname = $patientsLastname;
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
