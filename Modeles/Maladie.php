<?php

namespace AirTable\Modeles;

class Maladie
{
    protected ?int $id = null;
    protected ?string $idAirTable = null;
    protected ?string $name = null;
    protected ?array $patientsLastname = [];
    protected ?array $patientsFirstname = [];
    protected ?string $description = null;

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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array|null
     */
    public function getPatientsLastname(): ?array
    {
        return $this->patientsLastname;
    }

    /**
     * @param array|null $patientsLastname
     */
    public function setPatientsLastname(?array $patientsLastname): void
    {
        $this->patientsLastname = $patientsLastname;
    }

    /**
     * @return array|null
     */
    public function getPatientsFirstname(): ?array
    {
        return $this->patientsFirstname;
    }

    /**
     * @param array|null $patientsFirstname
     */
    public function setPatientsFirstname(?array $patientsFirstname): void
    {
        $this->patientsFirstname = $patientsFirstname;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }
}

