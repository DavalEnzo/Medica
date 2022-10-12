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
            $modele->setDoctor($job->{"fields"}->{"Lastname_doctor"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
