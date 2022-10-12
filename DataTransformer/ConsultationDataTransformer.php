<?php

namespace AirTable\DataTransformer;

use AirTable\Modeles\Consultation;
use AirTable\Repository\ConsultationRepository;

class ConsultationDataTransformer
{
    protected ConsultationRepository $consultationRepository;

    /**
     * @param ConsultationRepository $consultationRepository
     */
    public function __construct(ConsultationRepository $consultationRepository)
    {
        $this->consultationRepository = $consultationRepository;
    }

    public function transformConsultations() {
        $consultations = $this->consultationRepository->getConsultations();
        $id = 0;

        $modeles = [];

        foreach ($consultations->{"records"} as $consultation) {
            $modele = new Consultation();
            $modele->setDate(date_format(date_create($consultation->{"fields"}->{"Date"}), 'd/m/y h:i:s'));
            $modele->setFirstname($consultation->{"fields"}->{"Patients_Firstname"});
            $modele->setLastname($consultation->{"fields"}->{"Patients_Lastname"});
            $modele->setDiseases($consultation->{"fields"}->{"Diseases"});
            $modele->setDoctorName($consultation->{"fields"}->{"Doctor_name"});
            $modele->setIdAirTable($consultation->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
