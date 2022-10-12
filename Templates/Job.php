<?php
$title = "Medica - Jobs";
require_once "entete.php";

use \AirTable\DataTransformer\JobDataTransformer;
use \AirTable\Repository\JobRepository;

$dto = new JobDataTransformer(new JobRepository());
$jobs = $dto->transformJobs();

include_once "ModalJob.php";
?>
<div class="pl-80 bg-gray-50 dark:bg-gray-500 py-8 px-12 w-full h-screen">
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow my-10">
            Les Métiers
        </h2>
    </div>

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
                        <?= implode(", ", $job->getDoctors()); ?>
                    </td>
                    <td class="py-4 px-6">
                        <div class="float-right">
                            <button type="button"
                                    class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800"
                                    onclick="getApiJob('<?= $job->getIdAirTable(); ?>', 'Jobs')"
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
<?php
require_once "pied.php";
?>
