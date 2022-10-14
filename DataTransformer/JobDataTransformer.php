<?php

namespace AirTable\DataTransformer;

use AirTable\Modeles\Job;
use AirTable\Repository\JobRepository;

class JobDataTransformer
{
    protected JobRepository $jobRepository;

    /**
     * @param JobRepository $jobRepository
     */
    public function __construct(JobRepository $jobRepository)
    {
        $this->jobRepository = $jobRepository;
    }

    public function transformJobs() {
        $jobs = $this->jobRepository->getJobs();
        $id = 0;
        $modeles = [];

        foreach ($jobs->{"records"} as $job) {
            $modele = new Job();
            $modele->setName($job->{"fields"}->{"Name"});
            $modele->setDoctors(!empty($job->{"fields"}->{"Lastname_doctor"}) ? $job->{"fields"}->{"Lastname_doctor"} : null);
            $modele->setIdAirTable($job->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }

    public function transformJobsName() {
        $jobs = $this->jobRepository->getJobsName();
        $id = 0;
        $modeles = [];

        foreach ($jobs->{"records"} as $job) {
            $modele = new Job();
            $modele->setName($job->{"fields"}->{"Name"});
            $modele->setIdAirTable($job->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
