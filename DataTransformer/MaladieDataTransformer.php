<?php

namespace AirTable\DataTransformer;

use AirTable\Modeles\Maladie;
use AirTable\Repository\MaladieRepository;

class MaladieDataTransformer
{
    protected MaladieRepository $maladieRepository;

    /**
     * @param MaladieRepository $maladieRepository
     */
    public function __construct(MaladieRepository $maladieRepository)
    {
        $this->maladieRepository = $maladieRepository;
    }

    public function transformDiseases() {
        $diseases = $this->maladieRepository->getDiseases();
        $id = 0;

        $modeles = [];

        foreach ($diseases->{"records"} as $disease) {
            $modele = new Maladie();
            $modele->setName($disease->{"fields"}->{"Name"});
            $modele->setDescription($disease->{"fields"}->{"Description"});
            $modele->setPatientsLastname(!empty($disease->{"fields"}->{"Patients_Lastname"}) ? $disease->{"fields"}->{"Patients_Lastname"} : null);
            $modele->setPatientsFirstname(!empty($disease->{"fields"}->{"Patients_Firstname"}) ? $disease->{"fields"}->{"Patients_Firstname"} : null);
            $modele->setIdAirTable($disease->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }

    public function transformDiseasesName() {
        $diseases = $this->maladieRepository->getDiseasesName();
        $id = 0;

        $modeles = [];

        foreach ($diseases->{"records"} as $disease) {
            $modele = new Maladie();
            $modele->setName($disease->{"fields"}->{"Name"});
            $modele->setIdAirTable($disease->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
