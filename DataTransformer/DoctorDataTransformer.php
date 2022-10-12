<?php

namespace AirTable\DataTransformer;

use AirTable\Modeles\Doctor;
use AirTable\Repository\DoctorRepository;

class DoctorDataTransformer
{
    protected DoctorRepository $doctorRepository;

    /**
     * @param DoctorRepository $doctorRepository
     */
    public function __construct(DoctorRepository $doctorRepository)
    {
        $this->doctorRepository = $doctorRepository;
    }

    public function transformDoctors() {
        $doctors = $this->doctorRepository->getDoctors();
        $id = 0;

        $modeles = [];

        foreach ($doctors->{"records"} as $doctor) {
            $modele = new Doctor();
            $modele->setFirstname($doctor->{"fields"}->{"Firstname"});
            $modele->setLastname($doctor->{"fields"}->{"Lastname"});
            $modele->setNames($doctor->{"fields"}->{"Jobs_Name"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
