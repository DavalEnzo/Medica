<?php

use \AirTable\DataTransformer\PatientDataTransformer;
use \AirTable\Repository\PatientRepository;
use \AirTable\DataTransformer\MaladieDataTransformer;
use \AirTable\Repository\MaladieRepository;

$title = "Medica - Patients";
$self = "Patients";

require_once "entete.php";


$dto = new PatientDataTransformer(new PatientRepository());
$patients = $dto->transformPatients();

$dto = new MaladieDataTransformer(new MaladieRepository());
$diseases = $dto->transformDiseasesName();
$id = 1;

include_once "Modal/Create/ModalCreatePatient.php";
include_once "Modal/Update/ModalUpdatePatient.php";
include_once "Modal/Delete/ModalDelete.php";
?>

<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 px-12 grid gap-4 w-full h-screen">
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow my-10">Les Patients</h2>
    </div>

    <div class="overflow-x-auto rounded-lg">
        <table class="w-full text-medium text-left text-gray-300 dark:text-gray-200">
            <thead class="text-medium text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Id
                </th>
                <th scope="col" class="py-3 px-6">
                    Prénom
                </th>
                <th scope="col" class="py-3 px-6">
                    Nom
                </th>
                <th scope="col" class="py-3 px-6">
                    Âge
                </th>
                <th scope="col" class="py-3 px-6">
                    Email
                </th>
                <th scope="col" class="py-3 px-6">
                    Téléphone
                </th>
                <th scope="col" class="py-3 px-6">
                    Groupe sanguin
                </th>
                <th scope="col" class="py-3 px-6">
                    Lieu de résidence
                </th>
                <th scope="col" class="py-3 px-6">
                    Diagnostics
                </th>
                <th scope="col" class="py-3 text-center">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($patients as $patient) {
                ?>
                <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500">
                    <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                        <?= $patient->getId(); ?>
                    </th>
                    <td class="py-4 px-6">
                        <?= $patient->getFirstname(); ?>
                    </td>
                    <td class="py-4 px-6">
                        <h2> <?= $patient->getLastname(); ?> </h2>
                    </td>
                    <td class="py-4 px-6">
                        <h2> <?= $patient->getAge(); ?> </h2>
                    </td>
                    <td class="py-4 px-6">
                        <h2> <?= $patient->getEmail(); ?> </h2>
                    </td>
                    <td class="py-4 px-6">
                        <h2> <?= $patient->getPhone(); ?> </h2>
                    </td>
                    <td class="py-4 px-6">
                        <h2> <?= $patient->getSanguinGroup(); ?> </h2>
                    </td>
                    <td class="py-4 px-6">
                        <h2> <?= $patient->getCity(); ?>, <?= $patient->getCountry(); ?> </h2>
                    </td>
                    <td class="py-4 px-6">
                        <h2> <?= implode(", ", $patient->getDiseasesName()); ?> </h2>
                    </td>
                    <td class="py-4 px-6">
                        <div>
                            <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    onclick="getApiPatient('<?= $patient->getIdAirTable(); ?>', '<?= $self ?>')"
                                    data-modal-toggle="updateModal">
                                Modifier
                            </button>
                            <button type="button"
                                    data-modal-toggle="popup-modal"
                                    onclick="confirmationDeletePatient('<?= $patient->getIdAirTable(); ?>', '<?= $patient->getFirstname(); ?>' + ' ' + '<?= $patient->getLastname(); ?>')"
                                    class="focus:outline-none text-white bg-red-700 hover:bg-red-800 hover:ring-2 hover:ring-red-500 font-medium rounded-lg text-sm px-5 py-2.5  mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900">
                                Supprimer
                            </button>
                        </div>
                    </td>
                </tr>
                <?php
            }
            ?>
            <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500 sticky bottom-0 pb-1">
                <th colspan="10" scope="row"
                    class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                    <button type="button"
                            class="focus:outline-none text-white bg-green-700 hover:bg-green-800 hover:ring-2 hover:ring-green-500 font-medium rounded-lg text-sm px-5 py-2.5 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-900"
                            data-modal-toggle="createModal">
                        + Ajouter
                    </button>
                </th>
            </tr>
            </tbody>
        </table>
    </div>

</div>
<?php
require_once "pied.php";
?>
