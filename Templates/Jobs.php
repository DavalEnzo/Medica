<?php
use \AirTable\DataTransformer\JobDataTransformer;
use \AirTable\Repository\JobRepository;

$title = "Medica - Jobs";
$self = "Jobs";

require_once "entete.php";

$dto = new JobDataTransformer(new JobRepository());
$jobs = $dto->transformJobs();

include_once "Modal/ModalJob.php";
include_once "Modal/ModalDelete.php";

?>
<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 px-12 grid w-full h-screen">
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow my-10">
            Les Métiers
        </h2>
    </div>
    <button type="button"
            class="text-white bg-green-700 hover:bg-green-800 hover:ring-2 hover:ring-green-500 font-medium rounded-lg text-xl px-5 py-2.5 mr-2 mb-5 dark:bg-green-600 dark:hover:bg-green-700 focus:outline-none dark:focus:ring-green-800"
            data-modal-toggle="jobModal"
    >
        Créer un job
    </button>
    <div class="overflow-x-auto relative sm:rounded-lg">
        <table class="w-full text-xl text-left text-gray-300 dark:text-gray-200">
            <thead class="text-xl text-gray-300 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-300 sticky top-0">
            <tr>
                <th scope="col" class="py-3 px-6">
                    Id
                </th>
                <th scope="col" class="py-3 px-6">
                    Name
                </th>
                <th scope="col" class="py-3 px-6">
                    Docteurs
                </th>
                <th scope="col" class="py-3 text-center float-right pr-24">
                    Actions
                </th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach ($jobs as $job) {
                ?>
                <tr class="bg-white border-b dark:bg-gray-600 dark:border-gray-500">
                    <th scope="row" class="py-4 px-6 font-large text-gray-900 whitespace-nowrap dark:text-white"
                        id="id<?= $job->getId(); ?>">
                        <?= $job->getId(); ?>
                    </th>
                    <td class="py-4 px-6" id="date<?= $job->getId(); ?>">
                        <?= $job->getName(); ?>
                    </td>
                    <td class="py-4 px-6" id="maladies<?= $job->getId(); ?>">
                        <?=$job->getDoctors() === null ? "" :   implode(", ", $job->getDoctors()); ?>
                    </td>
                    <td class="py-4 px-6">
                        <div class="float-right">
                            <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    onclick="getApiJob('<?= $job->getIdAirTable(); ?>', '<?=$self?>')"
                                    data-modal-toggle="jobModal">
                                Modifier
                            </button>
                            <button type="button"
                                    data-modal-toggle="popup-modal"
                                    onclick="confirmationDeleteJob('<?=$job->getIdAirTable();?>', '<?=$job->getName();?>')"
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
<?php
require_once "pied.php";
?>
