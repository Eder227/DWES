<?php
    class F3 extends Monoplaza {
        private $nombreAcademia;

        public function __construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria, $nombreAcademia) {
            parent::__construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria);
            $this->nombreAcademia = $nombreAcademia;
        }

        public function getNombreAcademia(){
            return $this->nombreAcademia;
        }
        public function setNombreAcademia($nombreAcademia){
            $this->nombreAcademia = $nombreAcademia;
        }

        public function otorgarPuntos(int $posicion, bool $vueltaRapida) {
            $sumarPuntos = 0;
            $tablaPuntos = [0, 10, 8, 7, 6, 5, 4, 3, 2, 1, 0];

            if ($this->posicionValida($posicion)) {
                if ($posicion <= 10 && $vueltaRapida) {
                    $sumarPuntos += 2;
                }

                $sumarPuntos += $tablaPuntos[$posicion];
                $this->puntosCategoria += $sumarPuntos;
            }
        }

        public function posicionValida($posicion){
            return $posicion >= 1 && $posicion <= 30;
        }

        public function subirCategoria($superlicencia) {
            return new F2(
                $this->nombrePiloto,
                $this->nacionalidad,
                $this->numeroMonoplaza,
                $this->escuderia,
                $this->puntosCategoria,
                $superlicencia
            );
        }
    }
?>
