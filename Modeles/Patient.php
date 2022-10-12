<?php

namespace AirTable\Modeles;

class Patient
{
    protected int $id;
    protected string $idAirTable;
    protected string $firstname;
    protected string $lastname;
    protected string $email;
    protected int $age;
    protected string $phone;
    protected string $sanguin_group;
    protected array $diseases_name = [];
    protected string $country;
    protected string $city;

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
    public function getIdAirTable(): string
    {
        return $this->idAirTable;
    }

    /**
     * @param string $idAirTable
     */
    public function setIdAirTable(string $idAirTable): void
    {
        $this->idAirTable = $idAirTable;
    }

    /**
     * @return string
     */
    public function getFirstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     */
    public function setFirstname(string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function getLastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     */
    public function setLastname(string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function getEmail(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail(string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int
     */
    public function getAge(): int
    {
        return $this->age;
    }

    /**
     * @param int $age
     */
    public function setAge(int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string
     */
    public function getPhone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone(string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function getSanguinGroup(): string
    {
        return $this->sanguin_group;
    }

    /**
     * @param string $sanguin_group
     */
    public function setSanguinGroup(string $sanguin_group): void
    {
        $this->sanguin_group = $sanguin_group;
    }

    /**
     * @return array
     */
    public function getDiseasesName(): array
    {
        return $this->diseases_name;
    }

    /**
     * @param array $diseases_name
     */
    public function setDiseasesName(array $diseases_name): void
    {
        $this->diseases_name = $diseases_name;
    }

    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * @param string $country
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }


}
