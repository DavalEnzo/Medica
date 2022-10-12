<?php
$title = "Medica - Patients";
require_once "entete.php";

use \AirTable\DataTransformer\PatientDataTransformer;
use \AirTable\Repository\PatientRepository;

$dto = new PatientDataTransformer(new PatientRepository());
$patients = $dto->transformPatients();
$id = 1;

?>

<div class="bg-blue-200 py-12 px-44 grid gap-4 w-full">


    <h1 class="text-6xl text-center underline font-semibold my-2">Liste des patients</h1>
        <div class="container mx-auto mt-5">
        <?php
        $i = 0
        ?>
        <?php foreach ($patients as $patient) { ?>
            <div class="transition ease-in-out delay-150 bg-white border rounded-lg my-5 justify-around shadow-lg shadow-black hover:scale-105"
                 onclick="ouvrirInfos(<?= $i; ?>)">
                <div class="image inline-block w-20 my-2">
                    <img src="https://i.imgflip.com/1slnr0.jpg" class="mx-2 rounded-full" alt="">
                </div>
                <div class="inline-block align-top">
                    <h2 class="mx-5 my-2 text-2xl"><?= $patient->
                        getFirstname() . " " . $patient->getLastname() . ', ' . $patient->getAge() . " ans"; ?></h2>
                    <small class="plusInfos mx-5">Cliquez pour plus d'informations</small>
                    <div id="<?= $i; ?>" class="infos align-top hidden">
                        <p class="mx-5 my-2"><?= $patient->getEmail(); ?></p>
                        <p class="mx-5 my-2"><?= $patient->getPhone(); ?></p>
                        <p class="mx-5 my-2">Groupe Sanguin <?= $patient->getSanguinGroup(); ?></p>
                        <p class="mx-5 my-2">Réside à <?= $patient->getCity() ?>, en <?= $patient->getCountry(); ?></p>

                        <ul class="list-disc mx-5">
                            <p>Diagnostiques :</p>
                            <?php foreach ($patient->getDiseasesName() as $disease) { ?>
                                <li class="mx-10">
                                    <?= $disease; ?>
                                </li>
                            <?php }
                            ?>
                        </ul>
                    </div>
                </div>
            </div>
            <?php
            $i++;
        } ?>

    </div>
</div>

<?php
require_once "pied.php";
?>
