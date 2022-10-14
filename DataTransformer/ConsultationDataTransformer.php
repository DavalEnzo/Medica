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
            $modele->setDate(date_format(date_create($consultation->{"fields"}->{"Date"}), 'd/m/y H:i'));
            $modele->setPatientsFirstname(!empty($consultation->{"fields"}->{"Patients_Firstname"}) ? $consultation->{"fields"}->{"Patients_Firstname"} : null);
            $modele->setPatientsLastname(!empty($consultation->{"fields"}->{"Patients_Lastname"}) ? $consultation->{"fields"}->{"Patients_Lastname"} : null);
            $modele->setDiseases(!empty($consultation->{"fields"}->{"Diseases"}) ? $consultation->{"fields"}->{"Diseases"} : null);
            $modele->setDoctorName(!empty($consultation->{"fields"}->{"Doctor_name"}) ? $consultation->{"fields"}->{"Doctor_name"} : null);
            $modele->setIdAirTable($consultation->{"id"});
            $modele->setId(++$id);

            $modeles[] = $modele;
        }

        return $modeles;
    }
}
