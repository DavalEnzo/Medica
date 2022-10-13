<?php

namespace AirTable\Repository;

class DoctorRepository extends Repository
{
    protected const TABLE_NAME = "Doctors";

    protected const VIEW_GENERAL = "Doctors";
    protected const VIEW_DOCTORS_NAME = "Doctors_Name";

    public function getDoctors() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_GENERAL);
    }

    public function getDoctorsName() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_DOCTORS_NAME);
    }
}
