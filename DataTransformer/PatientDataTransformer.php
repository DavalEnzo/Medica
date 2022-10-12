<?php

namespace AirTable\DataTransformer;

use AirTable\Modeles\Patient;
use AirTable\Repository\PatientRepository;

class PatientDataTransformer
{
    protected PatientRepository $patientRepository;

    /**
     * @param PatientRepository $patientRepository
     */
    public function __construct(PatientRepository $patientRepository)
    {
        $this->patientRepository = $patientRepository;
    }

    public function transformPatients() {
        $patients = $this->patientRepository->getPatients();
        $id = 0;

        $modeles = [];

        foreach ($patients->{"records"} as $patient) {
            $modele = new Patient();
            $modele->setFirstname($patient->{"fields"}->{"Firstname"});
            $modele->setLastname($patient->{"fields"}->{"Lastname"});
            $modele->setEmail($patient->{"fields"}->{"Email"});
            $modele->setAge($patient->{"fields"}->{"Age"});
            $modele->setPhone($patient->{"fields"}->{"Phone"});
            $modele->setSanguinGroup($patient->{"fields"}->{"Blood_type"});
            $modele->setDiseasesName($patient->{"fields"}->{"Diseases_name"});
            $modele->setCountry($patient->{"fields"}->{"Country"});
            $modele->setCity($patient->{"fields"}->{"City"});
            $modele->setIdAirTable($patient->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }

    public function transformPatientsName() {
        $patients = $this->patientRepository->getPatientsName();
        $id = 0;

        $modeles = [];

        foreach ($patients->{"records"} as $patient) {
            $modele = new Patient();
            $modele->setFirstname($patient->{"fields"}->{"Firstname"});
            $modele->setLastname($patient->{"fields"}->{"Lastname"});
            $modele->setIdAirTable($patient->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
