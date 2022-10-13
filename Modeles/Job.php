<?php

namespace AirTable\Modeles;

class Job
{
    protected ?int $id = null;
    protected ?string $idAirTable = null;
    protected ?string $name = null;
    protected array $doctors = [];

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
     * @return array
     */
    public function getDoctors(): array
    {
        return $this->doctors;
    }

    /**
     * @param array $doctors
     */

    public function setDoctors(array $doctors): void
    {
        $this->doctors = $doctors;
    }

}
