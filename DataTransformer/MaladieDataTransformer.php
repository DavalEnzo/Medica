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
            $modele->setLastnames($disease->{"fields"}->{"Lastnames"});
            $modele->setFirstnames($disease->{"fields"}->{"Firstnames"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
