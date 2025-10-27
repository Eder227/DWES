<?php
    class F4 extends Monoplaza {
        private $paisCategoria;

        public function __construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria, $paisCategoria) {
            parent::__construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria);
            $this->paisCategoria = $paisCategoria;
        }

        public function getPaisCategoria(){
            return $this->paisCategoria;
        }
        public function setPaisCategoria($paisCategoria){
            $this->paisCategoria = $paisCategoria;
        }

        public function otorgarPuntos(int $posicion, bool $vueltaRapida) {
            $sumarPuntos = 0;
            $tablaPuntos = [0, 25, 18, 15, 12, 10, 8, 6, 4, 2, 1, 0];

            if ($this->posicionValida($posicion)) {
                $sumarPuntos += $tablaPuntos[$posicion];
                $this->puntosCategoria += $sumarPuntos;
            }
        }

        public function posicionValida($posicion){
            return $posicion >= 1 && $posicion <= 35;
        }

        public function subirCategoria($nombreAcademia) {
            return new F3(
                $this->nombrePiloto,
                $this->nacionalidad,
                $this->numeroMonoplaza,
                $this->escuderia,
                $this->puntosCategoria,
                $nombreAcademia
            );
        }
    }
?>
