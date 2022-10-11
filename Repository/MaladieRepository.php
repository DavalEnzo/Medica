<?php

namespace AirTable\Repository;

class MaladieRepository
{
    public function getDiseases() {
        $curl = curl_init();

        //configuration de la session
        curl_setopt($curl, CURLOPT_URL, "https://api.airtable.com/v0/appMxtIo1QNXAobOO/Diseases?&view=Diseases");
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $authorization = "Authorization: Bearer key8a3mXIZ9xFYw2n";
        curl_setopt($curl, CURLOPT_HTTPHEADER, ['Content-Type: application/json', $authorization]);

        $resultat = curl_exec($curl);
        return json_decode($resultat);
    }
}