<?php
    class F1 extends Monoplaza {
        private $patrocinadorPrincipal;

        public function __construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria, $patrocinadorPrincipal) {
            parent::__construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria);
            $this->patrocinadorPrincipal = $patrocinadorPrincipal;
        }

        public function getPatrocinadorPrincipal(){
            return $this->patrocinadorPrincipal;
        }
        public function setPatrocinadorPrincipal($patrocinadorPrincipal){
            $this->patrocinadorPrincipal = $patrocinadorPrincipal;
        }

        public function otorgarPuntos(int $posicion, bool $vueltaRapida) {
            $sumarPuntos = 0;
            $tablaPuntos = [0,25, 18, 15, 12, 10, 8, 6, 4, 2, 1, 0];

            if ($this->posicionValida($posicion)) {
                if ($posicion < 10 && $vueltaRapida) {
                    $sumarPuntos = $sumarPuntos + 1;
                }

                $sumarPuntos = $sumarPuntos + $tablaPuntos[$posicion];
                $this->puntosCategoria += $sumarPuntos;
            }
        }

        public function posicionValida($posicion){
            return $posicion >= 1 && $posicion <= 22;
        }

        public function subirCategoria(){
            return ["categoria maxima"];
        }
    }
?>
