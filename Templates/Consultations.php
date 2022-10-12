<?php
$title = "Medica - Consultations";
require_once "entete.php";
use \AirTable\DataTransformer\ConsultationDataTransformer;
use \AirTable\Repository\ConsultationRepository;

$dto = new ConsultationDataTransformer(new ConsultationRepository());
$consultations = $dto->transformConsultations();
?>
<div class="bg-yellow-100 py-12 px-44 grid gap-4 w-full">
    <div class="w-full text-center text-3xl">
        <h1>Les Consultations</h1>
    </div>

    <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
        <div class="text-center my-auto text-2xl w-1/5">
            <p>Id</p>
        </div>
        <div class="text-center my-auto text-2xl w-1/5">
            <h2> Date </h2>
        </div>
        <div class="text-center my-auto text-2xl w-1/5">
            <h2> Patient</h2>
        </div>
        <div class="text-center my-auto text-2xl w-1/5">
            <h2> Maladies</h2>
        </div>
        <div class="text-center my-auto text-2xl w-1/5">
            <h2> Docteur</h2>
        </div>

    </div>
    <?php
    foreach ($consultations as $consultation) {
        ?>

        <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
            <div class="text-center my-auto text-2xl w-1/6">
                <p><?=$consultation->getId();?></p>
            </div>
            <div class="text-center my-auto text-2xl w-1/6">
                <p><?=$consultation->getDate();?></p>
            </div>
            <div class="text-center my-auto text-2xl w-1/6">
                <h2> <?=$consultation->getFirstname()[0] . " " .$consultation->getLastname()[0];?> </h2>
            </div>
            <div class="text-center my-auto text-2xl w-1/6">
                <h2> <?=implode(", ", $consultation->getDiseases());?> </h2>
            </div>
            <div class="text-center my-auto text-2xl w-1/6">
                <h2> Dr. <?=$consultation->getDoctorName()[0];?> </h2>
            </div>
        </div>

        <?php
    }
    ?>
</div>


<?php
require_once "pied.php";
?>
