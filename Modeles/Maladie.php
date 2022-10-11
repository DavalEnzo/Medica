<?php

namespace AirTable\Modeles;

class Maladie
{
    protected int $id;
    protected string $name;
    protected array $lastnames = [];
    protected array $firstnames = [];
    protected string $description;

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
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return array
     */
    public function getLastnames(): array
    {
        return $this->lastnames;
    }

    /**
     * @param array $lastnames
     */
    public function setLastnames(array $lastnames): void
    {
        $this->lastnames = $lastnames;
    }

    /**
     * @return array
     */
    public function getFirstname(): array
    {
        return $this->firstnames;
    }

    /**
     * @param array $firstnames
     */
    public function setFirstnames(array $firstnames): void
    {
        $this->firstnames = $firstnames;
    }

    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription(string $description): void
    {
        $this->description = $description;
    }


}