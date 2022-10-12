<?php

namespace AirTable\Repository;

class ConsultationRepository extends Repository
{
    protected const TABLE_NAME = "Consultations";
    protected const GENERAL_VIEW = "Consultations";

    public function getConsultations() {
        return $this->getDatas(self::TABLE_NAME, self::GENERAL_VIEW);
    }
}
