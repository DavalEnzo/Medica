<?php
use \AirTable\DataTransformer\DoctorDataTransformer;
use \AirTable\Repository\DoctorRepository;
use \AirTable\DataTransformer\JobDataTransformer;
use \AirTable\Repository\JobRepository;

$title = "Medica - Docteurs";
$self = "Doctors";

require_once "entete.php";

$dto = new DoctorDataTransformer(new DoctorRepository());
$doctors = $dto->transformDoctors();

$dto = new JobDataTransformer(new JobRepository());
$jobs = $dto->transformJobsName();

include_once "Modal/ModalDocteur.php";
include_once "Modal/ModalDelete.php";
?>
<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 grid px-12 w-full h-screen">
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow my-10">
            Les Docteurs
        </h2>
    </div>

        <div class="overflow-x-auto rounded-lg">
            <table class="w-full text-xl text-left text-gray-300 dark:text-gray-200">
                <thead class="text-xl text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
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
                        Métiers
                    </th>
                    <th scope="col" class="py-3 text-center">
                        Actions
                    </th>
                </tr>
                </thead>
                <tbody>
                <?php
                foreach ($doctors as $doctor) {
                    ?>
                    <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500">
                        <th scope="row" class="py-4 px-6 font-large text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $doctor->getId(); ?>
                        </th>
                        <td class="py-4 px-6">
                            <?= $doctor->getFirstname(); ?>
                        </td>
                        <td class="py-4 px-6">
                            <h2> <?= $doctor->getLastname(); ?> </h2>
                        </td>
                        <td class="py-4 px-6">
                            <h2> <?= $doctor->getJobs() === null ? "" :  implode(", ", $doctor->getJobs()); ?> </h2>
                        </td>
                        <td class="py-4 px-6">
                            <div>
                                <button type="button"
                                        class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                        onclick="getApiDoctor('<?= $doctor->getIdAirTable(); ?>', '<?=$self?>')"
                                        data-modal-toggle="updateModal">
                                    Modifier
                                </button>
                                <button type="button"
                                        data-modal-toggle="popup-modal"
                                        onclick="confirmationDeleteDoctor('<?=$doctor->getIdAirTable();?>', '<?=$doctor->getFirstname();?>' + ' ' + '<?=$doctor->getLastname();?>')"
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
