<?php

namespace AirTable\Repository;

class PatientRepository extends Repository
{
    protected const TABLE_NAME = "Patients";
    protected const GENERAL_VIEW = "Patients";

    public function getPatients() {
        return $this->getDatas(self::TABLE_NAME, self::GENERAL_VIEW);
    }
}
