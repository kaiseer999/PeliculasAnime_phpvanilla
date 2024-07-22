<?php
class Anime extends Controlador{

    private $videoModelo;

    public function __construct()
    {
        $this->videoModelo= $this->modelo('Video');
    }



    
}









?>