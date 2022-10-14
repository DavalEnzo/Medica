<?php

namespace AirTable\Modeles;

class Patient
{
    protected ?int $id = null;
    protected ?string $idAirTable = null;
    protected ?string $firstname = null;
    protected ?string $lastname = null;
    protected ?string $email = null;
    protected ?int $age = null;
    protected ?string $phone = null;
    protected ?string $sanguin_group = null;
    protected ?array $diseases_name = [];
    protected ?string $country = null;
    protected ?string $city = null;

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
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return int|null
     */
    public function getAge(): ?int
    {
        return $this->age;
    }

    /**
     * @param int|null $age
     */
    public function setAge(?int $age): void
    {
        $this->age = $age;
    }

    /**
     * @return string|null
     */
    public function getPhone(): ?string
    {
        return $this->phone;
    }

    /**
     * @param string|null $phone
     */
    public function setPhone(?string $phone): void
    {
        $this->phone = $phone;
    }

    /**
     * @return string|null
     */
    public function getSanguinGroup(): ?string
    {
        return $this->sanguin_group;
    }

    /**
     * @param string|null $sanguin_group
     */
    public function setSanguinGroup(?string $sanguin_group): void
    {
        $this->sanguin_group = $sanguin_group;
    }

    /**
     * @return array|null
     */
    public function getDiseasesName(): ?array
    {
        return $this->diseases_name;
    }

    /**
     * @param array|null $diseases_name
     */
    public function setDiseasesName(?array $diseases_name): void
    {
        $this->diseases_name = $diseases_name;
    }

    /**
     * @return string|null
     */
    public function getCountry(): ?string
    {
        return $this->country;
    }

    /**
     * @param string|null $country
     */
    public function setCountry(?string $country): void
    {
        $this->country = $country;
    }

    /**
     * @return string|null
     */
    public function getCity(): ?string
    {
        return $this->city;
    }

    /**
     * @param string|null $city
     */
    public function setCity(?string $city): void
    {
        $this->city = $city;
    }

}
