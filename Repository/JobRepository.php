<?php

namespace AirTable\Repository;

class JobRepository extends Repository
{
    protected const TABLE_NAME = "Job";
    protected const GENERAL_VIEW = "Job";

    public function getJobs() {
        return $this->getDatas(self::TABLE_NAME, self::GENERAL_VIEW);
    }
}