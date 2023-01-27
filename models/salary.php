<?php
include '/../db.php';

class Stipendio
{

    private $mensile;
    private $tredicesima;
    private $quattordicesima;

    public function __construct(
        $mensile,
        $tredicesima,
        $quattordicesima
    )
    {

        $this->setMensile($mensile);
        $this->setTredicesima($tredicesima);
        $this->setQuattordicesima($quattordicesima);
    }

    public function getMensile()
    {

        return $this->mensile;
    }
    public function setMensile($mensile)
    {

        $this->mensile = $mensile;
    }
    public function getTredicesima()
    {

        return $this->tredicesima;
    }
    public function setTredicesima($tredicesima)
    {

        $this->tredicesima = $tredicesima;
    }
    public function getQuattordicesima()
    {

        return $this->quattordicesima;
    }
    public function setQuattordicesima($quattordicesima)
    {

        $this->quattordicesima = $quattordicesima;
    }

    public function getAnnualSalary()
    {

        // $mensile = $this->getMensile();
        // $res = $mensile * 12;
        // if ($this->getTredicesima()) {

        //     $res += $mensile;
        // }
        // if ($this->getQuattordicesima()) {

        //     $res += $mensile;
        // }

        // return $res;

        // VERSIONE 2: TERNARIO
        $mensile = $this->getMensile();
        return $mensile * 12
            + ($this->getTredicesima() ? $mensile : 0)
            + ($this->getQuattordicesima() ? $mensile : 0);
    }

    public function getHtml()
    {

        return "<div>" . "Mensile: " . $this->getMensile() . "</div>" . "<br>"
            . "Tredicesima: " . ($this->getTredicesima() ? "si'" : "no") . "<br>"
            . "Quattordicesima: " . ($this->getQuattordicesima() ? "si'" : "no") . "<br>"
            . "---------------<br>"
            . "Annuale: " . $this->getAnnualSalary();
    }
}
?>