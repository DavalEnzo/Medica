<?php

namespace AirTable\Repository;

class PatientRepository extends Repository
{
    protected const TABLE_NAME = "Patients";

    protected const VIEW_GENERAL = "Patients";
    protected const VIEW_PATIENT_NAME = "Patients_Name";

    public function getPatients() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_GENERAL);
    }

    public function getPatientsName() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_PATIENT_NAME);
    }
}
