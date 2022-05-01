<?php

class Ucet
{
    private $zustatek;

    /**
     * @param $zustatek
     */
    public function __construct()
    {
        $this->zustatek = 0;
    }

    /**
     * @return int
     */
    public function getZustatek(): int
    {
        return $this->zustatek;
    }

    /**
     * @param int $zustatek
     */
    public function setZustatek(int $zustatek): void
    {
        $this->zustatek = $zustatek;
    }

    public function vklad(int $castka) {
        if ($castka >= 0) {
            $this->zustatek += $castka;
            echo "Na účet byla vložena částka: $castka Kč.";
        } else {
            echo "Na účet nelze vložit zápornou částku.";
        }
    }

    public function vyber(int $castka) {
        if ($castka >= 0) {
            $this->zustatek -= $castka;
            echo "Z účtu byla vybrána částka: $castka Kč.";
        } else {
            echo "Z účtu nelze vybrat zápornou částku.";
        }
    }

    public function __destruct() {
        echo "Instance třídy ".get_class()." zrušena.\n";
    }

}