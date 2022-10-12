<?php

namespace AirTable\Repository;

class DoctorRepository extends Repository
{
    protected const TABLE_NAME = "Doctor";
    protected const GENERAL_VIEW = "Doctor";

    public function getDoctors() {
        return $this->getDatas(self::TABLE_NAME, self::GENERAL_VIEW);
    }
}
