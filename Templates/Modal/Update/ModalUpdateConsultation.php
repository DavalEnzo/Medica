<!-- Main modal -->
<div id="updateModal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="bg-gray-600 flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Modifier La consultation
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="updateModal">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                         xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                              d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
            </div>
            <!-- Modal body -->
            <div class="p-6 space-y-6">
                <div class="grid grid-cols-2 gap-2">
                    <div>
                        <label for="patientName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Selectionnez un patient</label>
                        <select name="patientName" id="patientName" class="bg-gray-50 border border-gray-300 text-gray-900 m-0 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php
                            foreach ($patientsName as $patientName) {
                                ?>
                                <option value="<?= $patientName->getIdAirTable(); ?>"><?= $patientName->getFirstname() . " ModalUpdateConsultation.php" . $patientName->getLastname();?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="grid-col">
                        <label for="doctorName" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Selectionnez un docteur</label>
                        <select name="doctorName" id="doctorName" class="bg-gray-50 border border-gray-300 text-gray-900 m-0 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                            <?php
                            foreach ($doctorsName as $doctorName) {
                                ?>
                                <option value="<?= $doctorName->getIdAirTable(); ?>"><?= $doctorName->getFirstname() . " ModalUpdateConsultation.php" . $doctorName->getLastname();?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div>
                    <div class="grid grid-cols-4 gap-2">
                        <div class="col-span-3">
                            <div class="relative">
                                <div class="flex absolute inset-y-0 left-0 items-center pt-7 pl-3 pointer-events-none">
                                    <svg aria-hidden="true" class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd"></path></svg>
                                </div>
                                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Heure</label>
                                <input id="dateTime" name="dateTime" datepicker datepicker-format="yyyy-mm-dd" type="text" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Select date">
                            </div>
                        </div>
                        <div class="col-span-1">
                            <div>
                                <label for="time" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-300">Heure</label>
                                <input type="time" name="time" id="time" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white" placeholder="name@company.com" required>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class=" p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <input type="text" id="consultationId" class="hidden">
                <div class="w-1/4">
                    <button type="button" onclick="updateConsultation('Consultations')"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Modifier
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>