<div class="p-6 space-y-6">
    <div class="grid grid-cols-3 gap-2">
        <div class="col-span-1">
            <label for="PatientFirstname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Prénom</label>
            <input type="text" id="PatientFirstname" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <p id="PatientFirstnameError" class="text-red-700 text-sm ml-5"></p>
        </div>
        <div class="col-span-1">
            <label for="PatientLastname" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Nom</label>
            <input type="text" id="PatientLastname" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <p id="PatientLastnameError" class="text-red-700 text-sm ml-5"></p>
        </div>
        <div class="col-span-1">
            <label for="PatientAge" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Âge</label>
            <input type="text" id="PatientAge" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
            <p id="PatientAgeError" class="text-red-700 text-sm ml-5"></p>
        </div>
    </div>
    <div class="grid grid-cols-2 gap-6">
        <div class="col-span-1">
            <div class="grid grid-rows-5 gap-2">
                <div class="row-span-1">
                    <label for="PatientEmail" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Email</label>
                    <input type="text" id="PatientEmail" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p id="PatientEmailError" class="text-red-700 text-sm ml-5"></p>
                </div>
                <div class="row-span-1">
                    <label for="PatientPhone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Téléphone</label>
                    <input type="text" id="PatientPhone" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p id="PatientPhoneError" class="text-red-700 text-sm ml-5"></p>
                </div>
                <div class="row-span-1">
                    <label for="PatientBlood" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Groupe Sanguin</label>
                    <select name="PatientBlood" id="PatientBlood" class="bg-gray-50 border border-gray-300 text-gray-900 m-0 rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                        <option value="O-">O-</option>
                        <option value="O+">O+</option>
                        <option value="A-">A-</option>
                        <option value="A+">A+</option>
                        <option value="B-">B-</option>
                        <option value="B+">B+</option>
                        <option value="AB-">AB-</option>
                        <option value="AB+">AB+</option>
                    </select>
                    <p id="PatientBloodError" class="text-red-700 text-sm ml-5"></p>
                </div>
                <div class="row-span-1">
                    <label for="PatientCity" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Ville</label>
                    <input type="text" id="PatientCity" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p id="PatientCityError" class="text-red-700 text-sm ml-5"></p>
                </div>
                <div class="row-span-1">
                    <label for="PatientCountry" class="block mb-2 text-sm font-medium text-gray-900 dark:text-gray-400">Pays</label>
                    <input type="text" id="PatientCountry" class="text-xl bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full  p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                    <p id="PatientCountryError" class="text-red-700 text-sm ml-5"></p>
                </div>
            </div>
        </div>
        <div class="col-span-1">
            <div class="row-span-1 mb-5">
                <h5 class="text-xl font-medium text-gray-700 dark:text-gray-300">Choisir ses Maladies</h5>
            </div>
            <?php foreach($diseases as $disease) { ?>
                <div class="flex items-center mb-4 row-span-1">
                    <input name="<?= $disease->getIdAirTable() ?>" id="<?= $disease->getIdAirTable() ?>" type="checkbox" class="patient-checkbox w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                    <label for="<?= $disease->getIdAirTable() ?>" class="ml-2 text-sm font-medium text-gray-900 dark:text-gray-300"><?= $disease->getName() ?></label>
                </div>
            <?php } ?>
            <p id="PatientDiseaseError" class="text-red-700 text-sm ml-5"></p>
        </div>
    </div>
</div>
<!-- Modal footer -->
<div class=" p-6 space-x-2 rounded-b border-t border-gray-200 dark:border-gray-600">
    <input type="text" id="PatientId" class="hidden">
    <div class="w-1/4">
        <button type="button" onclick="validationPatient('<?=$self?>')"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
            Confirmer
        </button>
    </div>
</div>