<?php
use \AirTable\Repository\ConsultationRepository;
use \AirTable\DataTransformer\ConsultationDataTransformer;
use \AirTable\Repository\PatientRepository;
use \AirTable\DataTransformer\PatientDataTransformer;
use \AirTable\Repository\DoctorRepository;
use \AirTable\DataTransformer\DoctorDataTransformer;

$title = "Medica - Consultations";

require_once "entete.php";
$dto = new ConsultationDataTransformer(new ConsultationRepository());
$consultations = $dto->transformConsultations();

$dto = new PatientDataTransformer(new PatientRepository());
$patientsName = $dto->transformPatientsName();

$dto = new DoctorDataTransformer(new DoctorRepository());
$doctorsName = $dto->transformDoctorsName();

include_once "Modal/ModalConsultation.php";
?>
<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 grid px-12 w-full h-screen">
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow my-10">
            Les Consultations
        </h2>
    </div>

    <!-- Pour les filtres -->
    <!--  <div class="overflow-x-auto relative rounded-lg">-->
    <!--        <table class="w-full text-xl text-left text-gray-500 dark:text-gray-400">-->
    <!--            <tbody class="text-xl text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">-->
    <!--            <tr>-->
    <!--                <th scope="col" class="p-4">-->
    <!--                    <div class="flex items-center">-->
    <!--                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
    <!--                        <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
    <!--                        <div class="px-6">-->
    <!--                            ID-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </th>-->
    <!---->
    <!--                <th scope="col" class="p-4">-->
    <!--                    <div class="flex items-center">-->
    <!--                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
    <!--                        <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
    <!--                        <div class="px-6">-->
    <!--                            DATES-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </th>-->
    <!---->
    <!--                <th scope="col" class="p-4">-->
    <!--                    <div class="flex items-center">-->
    <!--                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
    <!--                        <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
    <!--                        <div class="px-6">-->
    <!--                            PATIENTS-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </th>-->
    <!---->
    <!--                <th scope="col" class="p-4">-->
    <!--                    <div class="flex items-center">-->
    <!--                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
    <!--                        <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
    <!--                        <div class="px-6">-->
    <!--                            MALADIES-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </th>-->
    <!---->
    <!--                <th scope="col" class="p-4">-->
    <!--                    <div class="flex items-center">-->
    <!--                        <input id="checkbox-all-search" type="checkbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">-->
    <!--                        <label for="checkbox-all-search" class="sr-only">checkbox</label>-->
    <!--                        <div class="px-6">-->
    <!--                            DOCTEUR-->
    <!--                        </div>-->
    <!--                    </div>-->
    <!--                </th>-->
    <!--            </tr>-->
    <!--            </tbody>-->
    <!--        </table>-->
    <!--    </div>-->

    <div class="overflow-x-auto relative sm:rounded-lg">
        <table class="w-full text-xl text-left text-gray-300 dark:text-gray-200">
            <thead class="text-xl text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Id
                </th>
                <th scope="col" class="py-3 px-6">
                    Date
                </th>
                <th scope="col" class="py-3 px-6">
                    Patient
                </th>
                <th scope="col" class="py-3 px-6">
                    Maladies
                </th>
                <th scope="col" class="py-3 px-6">
                    Docteur
                </th>
                <th scope="col" class="py-3 text-center float-right pr-24">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($consultations as $consultation) {
                ?>
                <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500">
                    <th scope="row" class="py-4 px-6 font-large text-gray-900 whitespace-nowrap dark:text-white"
                        id="id<?= $consultation->getId(); ?>">
                        <?= $consultation->getId(); ?>
                    </th>
                    <td class="py-4 px-6" id="date<?= $consultation->getId(); ?>">
                        <?= $consultation->getDate(); ?>
                    </td>
                    <td class="py-4 px-6" id="name<?= $consultation->getId(); ?>">
                        <?= $consultation->getPatientsFirstname()[0] . " " . $consultation->getPatientsLastname()[0]; ?>
                    </td>
                    <td class="py-4 px-6" id="maladies<?= $consultation->getId(); ?>">
                        <?= implode(", ", $consultation->getDiseases()); ?>
                    </td>
                    <td class="py-4 px-6" id="docteur<?= $consultation->getId(); ?>">
                        Dr. <?= $consultation->getDoctorName()[0]; ?>
                    </td>
                    <td class="py-4 px-6">
                        <div class="float-right">
                            <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    onclick="getApiConsultation('<?= $consultation->getIdAirTable(); ?>', 'Consultations')"
                                    data-modal-toggle="defaultModal">
                                Modifier
                            </button>
                            <button type="button"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 hover:ring-2 hover:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>
</div>


<?php
require_once "pied.php";
?>
