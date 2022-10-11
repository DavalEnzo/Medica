<?php

require_once '../Modeles/Maladie.php';
require_once '../Repository/MaladieRepository.php';
require_once '../DataTransformer/MaladieDataTransformer.php';
require_once '../Modeles/Patient.php';
require_once '../Repository/PatientRepository.php';
require_once '../DataTransformer/PatientDataTransformer.php';
require_once '../Modeles/Doctor.php';
require_once '../Repository/DoctorRepository.php';
require_once '../DataTransformer/DoctorDataTransformer.php';
require_once '../Modeles/Consultation.php';
require_once '../Repository/ConsultationRepository.php';
require_once '../DataTransformer/ConsultationDataTransformer.php';
require_once '../Modeles/Job.php';
require_once '../Repository/JobRepository.php';
require_once '../DataTransformer/JobDataTransformer.php'
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="../style.css">
    <title>AirTable - Médecin</title>
</head>
<body>
    <nav class="h-16 w-full bg-blue-600 flex justify-around">
        <a href="Patient.php" class="w-full bg-blue-600 hover:bg-blue-500 hover:cursor-pointer">
            <div class="font-semibold text-xl text-white text-center mt-3.5">
                <h1>Patients</h1>
            </div>
        </a>
        <a href="Maladies.php" class="w-full bg-green-600 hover:bg-green-500 hover:cursor-pointer">
            <div class="font-semibold text-xl text-white text-center mt-3.5">
                <h1>Maladies</h1>
            </div>
        </a>
        <a href="Docteurs.php" class="w-full bg-red-600 hover:bg-red-500 hover:cursor-pointer">
            <div class="font-semibold text-xl text-white text-center mt-3.5">
                <h1>Docteurs</h1>
            </div>
        </a>
        <a href="Consultations.php" class="w-full bg-yellow-600 hover:bg-yellow-500 hover:cursor-pointer">
            <div class="font-semibold text-xl text-white text-center mt-3.5">
                <h1>Consultations</h1>
            </div>
        </a>
        <a href="Job.php" class="w-full bg-purple-600 hover:bg-purple-500 hover:cursor-pointer">
            <div class="font-semibold text-xl text-white text-center mt-3.5">
                <h1>Job</h1>
            </div>
        </a>
    </nav>
