<?php
require_once "entete.php";

use \AirTable\DataTransformer\DoctorDataTransformer;
use \AirTable\Repository\DoctorRepository;

$dto = new DoctorDataTransformer(new DoctorRepository());
$doctors = $dto->transformDoctors();
?>
    <div class="bg-red-100 py-12 px-44 grid gap-4 w-full">
        <div class="w-full text-center text-3xl">
            <h1>Les Doctors</h1>
        </div>

        <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
            <div class="text-center my-auto text-2xl">
                <p>Id</p>
            </div>
            <div class="text-center my-auto text-2xl w-1/4">
                <h2> Prénom </h2>
            </div>
            <div class="text-center my-auto text-2xl w-1/4">
                <h2> Nom</h2>
            </div>
            <div class="text-center my-auto text-2xl w-1/4">
                <h2> Métiers</h2>
            </div>
        </div>
        <?php
        foreach ($doctors as $doctor) {
        ?>

            <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
                <div class="text-center my-auto text-2xl">
                    <p><?=$doctor->getId();?></p>
                </div>
                <div class="text-center my-auto text-2xl w-1/4">
                    <h2> <?=$doctor->getFirstname();?> </h2>
                </div>
                <div class="text-center my-auto text-2xl w-1/4">
                    <h2> <?=$doctor->getLastname();?> </h2>
                </div>
                <div class="text-center my-auto text-2xl w-1/4">
                    <h2> <?=implode(", ", $doctor->getNames());?> </h2>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
<?php
require_once "pied.php";
?>