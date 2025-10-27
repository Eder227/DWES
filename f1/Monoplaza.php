<?php
    abstract class Monoplaza{
        protected $nombrePiloto;
        protected $nacionalidad;
        protected $numeroMonoplaza;
        protected $escuderia;
        protected $puntosCategoria;

        public function __construct($nombrePiloto, $nacionalidad, $numeroMonoplaza, $escuderia, $puntosCategoria){
            $this->nombrePiloto = $nombrePiloto;
            $this->nacionalidad = $nacionalidad;
            $this->numeroMonoplaza = $numeroMonoplaza;
            $this->escuderia = $escuderia;
            $this->puntosCategoria = $puntosCategoria;
        }

        public function getNombrePiloto(){
            return $this->nombrePiloto;
        }
        public function setNombrePiloto($nombrePiloto){
            $this->nombrePiloto = $nombrePiloto;
        }

        public function getNacionalidad(){
            return $this->nacionalidad;
        }
        public function setNacionalidad($nacionalidad){
            $this->nacionalidad = $nacionalidad;
        }

        public function getNumeroMonoplaza(){
            return $this->numeroMonoplaza;
        }
        public function setNumeroMonoplaza($numeroMonoplaza){
            $this->numeroMonoplaza = $numeroMonoplaza;
        }

        public function getEscuderia(){
            return $this->escuderia;
        }
        public function setEscuderia($escuderia){
            $this->escuderia = $escuderia;
        }

        public function getPuntosCategoria(){
            return $this->puntosCategoria;
        }
        public function setPuntosCategoria($puntosCategoria){
            $this->puntosCategoria = $puntosCategoria;
        }

        abstract public function otorgarPuntos(int $posicion, bool $vueltaRapida);

        public function posicionValida($posicion){
            return $posicion > 0;
        }
    }
?>



