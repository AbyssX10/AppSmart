<?php

    // Class (Clase) es un objeto en la vida real

    class Silla {
        private $tamanoEspaldar;
        private $cantidadPatas;
        private $comodiadCojin;

        function __construct($pTamanoEspaldar, $pCantidadPatas, $pComodidad)
        {
            $this->tamanoEspaldar = $pTamanoEspaldar;
            $this->cantidadPatas = $pCantidadPatas;
            $this->comodiadCojin = $pComodidad;
        }

        function GetTamanoEspaldar(){
            return $this->tamanoEspaldar;
        }

        function GetCantidadPatas(){
            return $this->cantidadPatas;
        }
    }

    $silla = new Silla(1, 3, "Incomodo");
    $silla2 = new Silla(2, 4, "Muy comodo");
    $silla3 = new Silla(1.5, 4, "Medianamente comodo");
    $silla4 = new Silla(0, 4, "Regularmente incomodo");

    echo $silla->GetCantidadPatas();

?>