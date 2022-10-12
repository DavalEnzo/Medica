<?php
$title = "Medica - Maladies";
require_once "entete.php";

use \AirTable\DataTransformer\MaladieDataTransformer;
use \AirTable\Repository\MaladieRepository;

$dto = new MaladieDataTransformer(new MaladieRepository());
$diseases = $dto->transformDiseases();
?>
<div class="bg-green-100 py-12 px-44 grid gap-4 w-full">
    <div class="w-full text-center text-3xl">
        <h1>Les Maladies</h1>
    </div>


    <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
        <div class="text-center my-auto text-2xl">
            <p>Id</p>
        </div>
        <div class="text-center my-auto text-2xl w-1/4">
            <h2> Nom </h2>
        </div>
        <div class="text-center my-auto text-2xl w-3/4">
            <h2> Description </h2>
        </div>
    </div>
<?php
foreach ($diseases as $disease) {
?>

    <div class="my-5 bg-white border rounded-lg flex p-5 justify-around shadow-lg shadow-black">
        <div class="text-center my-auto text-2xl">
            <p><?=$disease->getId()?></p>
        </div>
        <div class="text-center my-auto text-2xl w-1/4">
            <h2> <?=$disease->getName();?> </h2>
        </div>
        <div class="text-center mt-2 text-lg w-3/4">
            <p> <?=$disease->getDescription();?> </p>
        </div>
    </div>

<?php
}
?>
</div>
<?php
require_once "pied.php";
?>
