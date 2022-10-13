<!-- Main modal -->
<div id="createModal" tabindex="-1" aria-hidden="true"
     class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 w-full md:inset-0 h-modal md:h-full">
    <div class="relative p-4 w-full max-w-2xl h-full md:h-auto">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
            <!-- Modal header -->
            <div class="bg-gray-600 flex justify-between items-start p-4 rounded-t border-b dark:border-gray-600">
                <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                    Créer un Patient
                </h3>
                <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="createModal">
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
                <div class="grid grid-cols-3 gap-2">
                    <div class="col-span-1">
                        <label for="CreatePatientFirstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Prénom</label>
                        <input type="text" id="CreatePatientFirstname" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <p id="CreatePatientFirstnameError" class="text-red-600 text-xs ml-3"></p>
                    </div>
                    <div class="col-span-1">
                        <label for="CreatePatientLastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nom</label>
                        <input type="text" id="CreatePatientLastname" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <p id="CreatePatientLastnameError" class="text-red-600 text-xs ml-3"></p>
                    </div>
                    <div class="col-span-1">
                        <label for="CreatePatientAge" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Âge</label>
                        <input type="text" id="CreatePatientAge" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <p id="CreatePatientAgeError" class="text-red-600 text-xs ml-3"></p>
                    </div>
                </div>
                <div class="grid grid-cols-2 gap-6">
                    <div class="col-span-1">
                        <div class="grid grid-rows-5 gap-2">
                            <div class="row-span-1">
                                <label for="CreatePatientEmail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Email</label>
                                <input type="text" id="CreatePatientEmail" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <p id="CreatePatientEmailError" class="text-red-600 text-xs ml-3"></p>
                            </div>
                            <div class="row-span-1">
                                <label for="CreatePatientPhone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Téléphone</label>
                                <input type="text" id="CreatePatientPhone" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <p id="CreatePatientPhoneError" class="text-red-600 text-xs ml-3"></p>
                            </div>
                            <div class="row-span-1">
                                <label for="CreatePatientBlood" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Groupe Sanguin</label>
                                <select name="CreatePatientBlood" id="CreatePatientBlood" class="bg-gray-50 border border-gray-300 text-gray-900 m-0 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                    <option value="O-">O-</option>
                                    <option value="O+">O+</option>
                                    <option value="A-">A-</option>
                                    <option value="A+">A+</option>
                                    <option value="B-">B-</option>
                                    <option value="B+">B+</option>
                                    <option value="AB-">AB-</option>
                                    <option value="AB+">AB+</option>
                                </select>
                                <p id="CreatePatientBloodError" class="text-red-600 text-xs ml-3"></p>
                            </div>
                            <div class="row-span-1">
                                <label for="CreatePatientCity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Ville</label>
                                <input type="text" id="CreatePatientCity" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <p id="CreatePatientCityError" class="text-red-600 text-xs ml-3"></p>
                            </div>
                            <div class="row-span-1">
                                <label for="CreatePatientCountry" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pays</label>
                                <input type="text" id="CreatePatientCountry" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                                <p id="CreatePatientCountryError" class="text-red-600 text-xs ml-3"></p>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-1">
                        <div class="row-span-1 mb-5">
                            <h5 class="text-xl font-medium text-gray-700 dark:text-gray-300">Choisir ses Maladies</h5>
                        </div>
                        <?php foreach($diseases as $disease) { ?>
                            <div class="flex items-center mb-4 row-span-1">
                                <input name="<?= $disease->getIdAirTable() ?>" id="<?= $disease->getIdAirTable() ?>" type="checkbox" class="CreatePatient-checkbox w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="<?= $disease->getIdAirTable() ?>" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $disease->getName() ?></label>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
            <!-- Modal footer -->
            <div class=" p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
                <div class="w-1/4">
                    <button type="button" onclick="createPatient('Patients')"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Créer
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>