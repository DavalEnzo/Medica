<?php

namespace AirTable\Repository;

class MaladieRepository extends Repository
{
    protected const TABLE_NAME = "Diseases";
    protected const GENERAL_VIEW = "Diseases";

    public function getDiseases() {
        return $this->getDatas(self::TABLE_NAME, self::GENERAL_VIEW);
    }
}