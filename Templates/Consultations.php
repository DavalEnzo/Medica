<?php
$title = "Medica - Consultations";
require_once "entete.php";

use \AirTable\DataTransformer\ConsultationDataTransformer;
use \AirTable\Repository\ConsultationRepository;

$dto = new ConsultationDataTransformer(new ConsultationRepository());
$consultations = $dto->transformConsultations();
?>
<div class="bg-gray-50 dark:bg-gray-500 py-8 px-12 grid gap-4 w-full h-screen">
    <div class="w-full text-center text-3xl">
        <h2 class="text-4xl font-bold dark:text-white text-shadow"> Les Consultations</h2>
    </div>

    <!-- Main modal -->
    <div id="defaultModal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
        <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white" data-modal-toggle="defaultModal">
                        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-6 space-y-6">
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        With less than a month to go before the European Union enacts new consumer privacy laws for its citizens, companies around the world are updating their terms of service agreements to comply.
                    </p>
                    <p class="text-base leading-relaxed text-gray-500 dark:text-gray-400">
                        The European Union’s General Data Protection Regulation (G.D.P.R.) goes into effect on May 25 and is meant to ensure a common set of data rights in the European Union. It requires organizations to notify users as soon as possible of high-risk data breaches that could personally affect them.
                    </p>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                    <button data-modal-toggle="defaultModal" type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">I accept</button>
                    <button data-modal-toggle="defaultModal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-blue-300 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">Decline</button>
                </div>
            </div>
        </div>
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
                    <th scope="row" class="py-4 px-6 font-large text-gray-900 whitespace-nowrap dark:text-white" id="id<?= $consultation->getId(); ?>">
                        <?= $consultation->getId(); ?>
                    </th>
                    <td class="py-4 px-6" id="date<?= $consultation->getId(); ?>">
                        <?= $consultation->getDate(); ?>
                    </td>
                    <td class="py-4 px-6" id="name<?= $consultation->getId(); ?>">
                        <?= $consultation->getFirstname()[0] . " " . $consultation->getLastname()[0]; ?>
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
                                    class="text-white bg-blue-700 hover:bg-blue-800 hover:ring-2 hover:ring-blue-500 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800" onclick="showModals('<?= $consultation->getIdAirTable();?>, Consultations')" data-modal-toggle="defaultModal">
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
