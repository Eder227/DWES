<?php
    class FAcademia extends Monoplaza {
        private $potenciaMaxima;

        public function __construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria, $potenciaMaxima) {
            parent::__construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria);
            $this->potenciaMaxima = $potenciaMaxima;
        }

        public function getPotenciaMaxima(){
            return $this->potenciaMaxima;
        }
        public function setPotenciaMaxima($potenciaMaxima){
            $this->potenciaMaxima = $potenciaMaxima;
        }

        public function otorgarPuntos(int $posicion, bool $vueltaRapida) {
            $sumarPuntos = 0;
            $tablaPuntos = [0, 18, 15, 12, 10, 8, 6, 4, 2, 1, 0];

            if ($this->posicionValida($posicion)) {
                $sumarPuntos += $tablaPuntos[$posicion];
                $this->puntosCategoria += $sumarPuntos;
            }
        }

        public function posicionValida($posicion){
            return $posicion >= 1 && $posicion <= 40;
        }

        public function subirCategoria($paisCategoria) {
            return new F4(
                $this->nombrePiloto,
                $this->nacionalidad,
                $this->numeroMonoplaza,
                $this->escuderia,
                $this->puntosCategoria,
                $paisCategoria
            );
        }
    }
?>
