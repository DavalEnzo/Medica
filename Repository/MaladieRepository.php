<?php

namespace AirTable\Repository;

class MaladieRepository extends Repository
{
    protected const TABLE_NAME = "Diseases";

    protected const VIEW_GENERAL = "Diseases";
    protected const VIEW_DISEASES_NAME = "Diseases_Name";

    public function getDiseases() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_GENERAL);
    }

    public function getDiseasesName() {
        return $this->getDatas(self::TABLE_NAME, self::VIEW_DISEASES_NAME);
    }
}
