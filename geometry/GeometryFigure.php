<?php

class GeometryFigure 
{
    public $name = 'Figure';

    public function getName(){
        return $this->$name;
    }

    public function getArea(){
        return 0;
    }

    public function getPerimeter(){
        return 0;
    }
}