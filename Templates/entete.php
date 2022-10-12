<?php

require_once '../Repository/Repository.php';
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
require_once '../DataTransformer/JobDataTransformer.php';

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="../style.css">
    <title><?= $title; ?></title>
</head>
<body>

<aside class="w-72 fixed left-0 top-0" aria-label="Sidebar">
    <div class="overflow-y-auto py-4  h-screen px-3 bg-gray-50 text-xl rounded-tr-lg rounded-br-lg dark:bg-gray-600">
        <div class="text-white inline-block text-5xl font-semibold mb-10"><img class="inline-block w-20"
                                                                               src="https://icons.veryicon.com/png/o/business/circular-multi-color-function-icon/health-health.png">
            Medica
        </div>
        <ul class="space-y-8">
            <li class="hover:bg-gray-500 rounded-lg hover: transition ease-in-out hover:bg-opacity-50 duration-700">
                <a href="Patient.php" class="w-full flex items-center text-white hover:cursor-pointer">
                    <svg aria-hidden="true"
                         class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                              clip-rule="evenodd"></path>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Patients</span>
                </a>
            </li>
            <li class="hover:bg-gray-500 rounded-lg hover: transition ease-in-out hover:bg-opacity-50 duration-700">
                <a href="Maladies.php" class="w-full flex items-center text-white hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-virus2 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" viewBox="0 0 16 16">
                        <path fill-rule="evenodd"
                              d="M8 0a1 1 0 0 0-1 1v1.143c0 .557-.407 1.025-.921 1.24-.514.214-1.12.162-1.513-.231l-.809-.809a1 1 0 1 0-1.414 1.414l.809.809c.393.394.445.999.23 1.513C3.168 6.593 2.7 7 2.142 7H1a1 1 0 0 0 0 2h1.143c.557 0 1.025.407 1.24.921.214.514.162 1.12-.231 1.513l-.809.809a1 1 0 0 0 1.414 1.414l.809-.809c.394-.394.999-.445 1.513-.23.514.214.921.682.921 1.24V15a1 1 0 1 0 2 0v-1.143c0-.557.407-1.025.921-1.24.514-.214 1.12-.162 1.513.231l.809.809a1 1 0 0 0 1.414-1.414l-.809-.809c-.394-.394-.445-.999-.23-1.513.214-.514.682-.921 1.24-.921H15a1 1 0 1 0 0-2h-1.143c-.557 0-1.025-.407-1.24-.921-.214-.514-.163-1.12.231-1.513l.809-.809a1 1 0 1 0-1.415-1.414l-.808.809c-.394.393-.999.445-1.513.23C9.407 3.168 9 2.7 9 2.142V1a1 1 0 0 0-1-1Zm2 5a1 1 0 1 1-2 0 1 1 0 0 1 2 0ZM7 7a1 1 0 1 1-2 0 1 1 0 0 1 2 0Zm1 5a1 1 0 1 0 0-2 1 1 0 0 0 0 2Zm4-4a1 1 0 1 1-2 0 1 1 0 0 1 2 0Z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Maladies</span>
                </a>
            </li>
            <li class="hover:bg-gray-500 rounded-lg hover: transition ease-in-out hover:bg-opacity-50 duration-700">
                <a href="Docteurs.php" class="w-full flex items-center text-white hover:cursor-pointer">
                    <svg class="flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                        <g>
                            <path fill="none" d="M0 0H24V24H0z"/>
                            <path d="M8 3v2H6v4c0 2.21 1.79 4 4 4s4-1.79 4-4V5h-2V3h3c.552 0 1 .448 1 1v5c0 2.973-2.162 5.44-5 5.917V16.5c0 1.933 1.567 3.5 3.5 3.5 1.497 0 2.775-.94 3.275-2.263C16.728 17.27 16 16.22 16 15c0-1.657 1.343-3 3-3s3 1.343 3 3c0 1.371-.92 2.527-2.176 2.885C19.21 20.252 17.059 22 14.5 22 11.462 22 9 19.538 9 16.5v-1.583C6.162 14.441 4 11.973 4 9V4c0-.552.448-1 1-1h3zm11 11c-.552 0-1 .448-1 1s.448 1 1 1 1-.448 1-1-.448-1-1-1z"/>
                        </g>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Docteurs</span>
                </a>
            </
            >
            <li class="hover:bg-gray-500 rounded-lg hover: transition ease-in-out hover:bg-opacity-50 duration-700">
                <a href="Consultations.php" class="w-full flex items-center text-white hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-calendar-check-fill flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         viewBox="0 0 16 16">
                        <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Consultations</span>
                </a>
            </li>
            <li class="hover:bg-gray-500 rounded-lg hover: transition ease-in-out hover:bg-opacity-50 duration-700">
                <a href="Job.php" class="w-full flex items-center text-white hover:cursor-pointer">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                         class="bi bi-briefcase-fill flex-shrink-0 w-6 h-6 text-white transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
                         viewBox="0 0 16 16">
                        <path d="M6.5 1A1.5 1.5 0 0 0 5 2.5V3H1.5A1.5 1.5 0 0 0 0 4.5v1.384l7.614 2.03a1.5 1.5 0 0 0 .772 0L16 5.884V4.5A1.5 1.5 0 0 0 14.5 3H11v-.5A1.5 1.5 0 0 0 9.5 1h-3zm0 1h3a.5.5 0 0 1 .5.5V3H6v-.5a.5.5 0 0 1 .5-.5z"/>
                        <path d="M0 12.5A1.5 1.5 0 0 0 1.5 14h13a1.5 1.5 0 0 0 1.5-1.5V6.85L8.129 8.947a.5.5 0 0 1-.258 0L0 6.85v5.65z"/>
                    </svg>
                    <span class="flex-1 ml-3 whitespace-nowrap">Job</span>
                </a>
            </li>
        </ul>
    </div>
    <p class="fixed text-sm bottom-0">© Medica 2022 Nathan Barbier et Enzo Daval</p>
</aside>
