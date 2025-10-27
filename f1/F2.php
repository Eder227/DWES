<?php
    class F2 extends Monoplaza {
        private $superLicencia;

        public function __construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria, $superLicencia) {
            parent::__construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria);
            $this->superLicencia = $superLicencia;
        }

        public function getSuperLicencia(){
            return $this->superLicencia;
        }
        public function setSuperLicencia($superLicencia){
            $this->superLicencia = $superLicencia;
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
            return $posicion >= 1 && $posicion <= 22;
        }

        public function subirCategoria($patrocinadorPrincipal) {
            return new F1(
                $this->nombrePiloto,
                $this->nacionalidad,
                $this->numeroMonoplaza,
                $this->escuderia,
                $this->puntosCategoria,
                $patrocinadorPrincipal
            );
    
        }
    }    
?>
