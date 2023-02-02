<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>phh-oop-3</title>
</head>

<body>
    <?php
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

        // faccio diventare le variabili visibili anche all'esterno 
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

        // calcolo il salario annuale
        public function getAnnualSalary()
        {

            // VERSIONE 1: IF
            // $mensile = $this -> getMensile();
            // $res = $mensile * 12;
            // if ($this -> getTredicesima()) {
    
            //     $res += $mensile;
            // }
            // if ($this -> getQuattordicesima()) {
    
            //     $res += $mensile;
            // }
    
            // return $res;
    
            // VERSIONE 2: TERNARIO
            $mensile = $this->getMensile();
            return $mensile * 12
                + ($this->getTredicesima() ? $mensile : 0)
                + ($this->getQuattordicesima() ? $mensile : 0);
        }

        // funzione da richiamare per stampare a schermo i risultati
        public function getHtml()
        {

            return "Mensile: " . $this->getMensile() . "<br>"
                . "Tredicesima: " . ($this->getTredicesima() ? "si'" : "no") . "<br>"
                . "Quattordicesima: " . ($this->getQuattordicesima() ? "si'" : "no") . "<br>"
                . "---------------<br>"
                . "Annuale: " . $this->getAnnualSalary();
        }
    }

    class Persona
    {

        private $nome;
        private $cognome;
        private $dataNascita;
        private $luogoNascita;
        private $cf;

        public function __construct(
            $nome,
            $cognome,
            $dataNascita,
            $luogoNascita,
            $cf
        )
        {

            $this->setNome($nome);
            $this->setCognome($cognome);
            $this->setDataNascita($dataNascita);
            $this->setLuogoNascita($luogoNascita);
            $this->setCf($cf);
        }

        public function getNome()
        {

            return $this->nome;
        }
        public function setNome($nome)
        {

            $this->nome = $nome;
        }
        public function getCognome()
        {

            return $this->cognome;
        }
        public function setCognome($cognome)
        {

            $this->cognome = $cognome;
        }
        public function getDataNascita()
        {

            return $this->dataNascita;
        }
        public function setDataNascita($dataNascita)
        {

            $this->dataNascita = $dataNascita;
        }
        public function getLuogoNascita()
        {

            return $this->luogoNascita;
        }
        public function setLuogoNascita($luogoNascita)
        {

            $this->luogoNascita = $luogoNascita;
        }
        public function getCf()
        {

            return $this->cf;
        }
        public function setCf($cf)
        {

            $this->cf = $cf;
        }

        public function getHtml()
        {

            return $this->getNome() . " " . $this->getCognome() . "<br>"
                . $this->getDataNascita() . " - " . $this->getLuogoNascita() . "<br>"
                . $this->getCf();
        }
    }

    class Impiegato extends Persona
    {

        private Stipendio $stipendio;
        private $dataAssunzione;

        public function __construct(
            $nome,
            $cognome,
            $dataNascita,
            $luogoNascita,
            $cf, Stipendio $stipendio,
            $dataAssunzione
        )
        {

            // richiamo i dati di Persona e li ridichiaro all'interno di impiegato
            parent::__construct(
                $nome,
                $cognome,
                $dataNascita,
                $luogoNascita,
                $cf
            );

            $this->setStipendio($stipendio);
            $this->setDataAssunzione($dataAssunzione);
        }

        public function getStipendio()
        {

            return $this->stipendio;
        }
        public function setStipendio($stipendio)
        {

            $this->stipendio = $stipendio;
        }
        public function getDataAssunzione()
        {

            return $this->dataAssunzione;
        }
        public function setDataAssunzione($dataAssunzione)
        {

            $this->dataAssunzione = $dataAssunzione;
        }

        public function getAnnualSalary()
        {

            return $this->getStipendio()->getAnnualSalary();
        }

        public function getHtml()
        {

            return parent::getHtml() . "<br>"
                . $this->getDataAssunzione() . "<br>"
                . $this->getStipendio()->getHtml();
        }
    }

    class Capo extends Persona
    {

        private $dividendo;
        private $bonus;

        public function __construct(
            $nome,
            $cognome,
            $dataNascita,
            $luogoNascita,
            $cf,
            $dividendo,
            $bonus
        )
        {

            parent::__construct(
                $nome,
                $cognome,
                $dataNascita,
                $luogoNascita,
                $cf
            );

            $this->setDividendo($dividendo);
            $this->setBonus($bonus);
        }

        public function getDividendo()
        {

            return $this->dividendo;
        }
        public function setDividendo($dividendo)
        {

            $this->dividendo = $dividendo;
        }
        public function getBonus()
        {

            return $this->bonus;
        }
        public function setBonus($bonus)
        {

            $this->bonus = $bonus;
        }

        public function getAnnualSalary()
        {

            return $this->getDividendo() * 12 + $this->getBonus();
        }

        public function getHtml()
        {

            return parent::getHtml() . "<br>"
                . $this->getDividendo() . "<br>"
                . $this->getBonus() . "<br>"
                . "---------------<br>"
                . $this->getAnnualSalary();
        }
    }


    $stipendio1 = new Stipendio(1800, true, true);
    echo $stipendio1->getHtml();

    echo "<br><br>--------------------------------<br><br>";

    $persona1 = new Persona("Mario", "Rossi", "Roma", "1990-01-01", "MRCRSS90SDJFLSKD");
    echo $persona1->getHtml();

    echo "<br><br>--------------------------------<br><br>";

    $impiegato1 = new Impiegato("Chiara", "Bianchi", "Milano", "1999-12-31", "CHRBNC90ASDFASDF", $stipendio1, "2023-01-15");
    echo $impiegato1->getHtml();

    echo "<br><br>--------------------------------<br><br>";

    $capo1 = new Capo("Federico", "Verdi", "Torino", "1995-05-05", "FDRVRD95AASDFAS", 3200, 10000);
    echo $capo1->getHtml();
    ?>
</body>

</html>