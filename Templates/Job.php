<?php
require_once "entete.php";

use \AirTable\DataTransformer\JobDataTransformer;
use \AirTable\Repository\JobRepository;

$dto = new JobDataTransformer(new JobRepository());
$jobs = $dto->transformJobs();
?>
    <div class="bg-purple-100 py-12 px-44 grid gap-4 w-full">
        <div class="w-full text-center text-3xl">
            <h1>Les Jobs</h1>
        </div>

        <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
            <div class="text-center my-auto text-2xl">
                <p>Id</p>
            </div>
            <div class="text-center my-auto text-2xl w-1/4">
                <h2> Nom</h2>
            </div>
            <div class="text-center my-auto text-2xl w-1/4">
                <h2> Docteurs associés</h2>
            </div>
        </div>
        <?php
        foreach ($jobs as $job) {
            ?>

            <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
                <div class="text-center my-auto text-2xl">
                    <p><?= $job->getId(); ?></p>
                </div>  
                <div class="text-center my-auto text-2xl w-1/4">
                    <h2> <?= $job->getName(); ?> </h2>
                </div>
                <div class="text-center my-auto text-2xl w-1/4">
                    <h2> <?= implode(", ", $job->getDoctor()); ?></h2>
                </div>
            </div>

            <?php
        }
        ?>
    </div>
<?php
require_once "pied.php";
?>