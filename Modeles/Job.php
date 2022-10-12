<?php

namespace AirTable\Modeles;

class Job
{
    protected int $id;
    protected string $name;
    protected array $doctors = [];

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
    public function getDoctors(): array
    {
        return $this->doctor;
    }

    /**
     * @param array $doctor
     */
    public function setDoctors(array $doctor): void
    {
        $this->doctor = $doctor;
    }
}
