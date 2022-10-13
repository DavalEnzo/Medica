<?php

namespace AirTable\Repository;

class JobRepository extends Repository
{
    protected const TABLE_NAME = "Jobs";

    protected const VIEW_GENERAL = "Jobs";
    protected const VIEW_JOBS_NAME = "Jobs_Name";

    public function getJobs() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_GENERAL);
    }

    public function getJobsName() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_JOBS_NAME);
    }
}
