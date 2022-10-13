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
            $modele->setJobs($doctor->{"fields"}->{"Jobs_Name"});
            $modele->setIdAirTable($doctor->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }

    public function transformDoctorsName() {
        $doctors = $this->doctorRepository->getDoctorsName();
        $id = 0;

        $modeles = [];

        foreach ($doctors->{"records"} as $doctor) {
            $modele = new Doctor();
            $modele->setFirstname($doctor->{"fields"}->{"Firstname"});
            $modele->setLastname($doctor->{"fields"}->{"Lastname"});
            $modele->setIdAirTable($doctor->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }
        return $modeles;
    }
}
