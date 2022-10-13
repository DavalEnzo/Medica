<?php

namespace AirTable\Repository;

class JobRepository extends Repository
{
    protected const TABLE_NAME = "Jobs";
    protected const GENERAL_VIEW = "Jobs";

    public function getJobs() {
        return $this->getDatas(self::TABLE_NAME, self::GENERAL_VIEW);
    }
}