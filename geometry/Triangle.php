<?php

class Triangle extends GeometryFigure 
{

    function __construct() {
         $this->$name = 'Треугольник';
         $this->$a = 3;
         $this->$b = 4;
         $this->$h = 10;
         $this->$c = 7;
    }

    public function getName(){
        return "Название фигуры: ".$this->$name;
    }

    public function getArea(){
        $result = 0.5 * $this->$b * $this->$h;
        return "Площадь треугольника: $result";
    }

    public function getPerimeter(){
        $result = $this->$a + $this->$b + $this->$c;
       return  "Периметр треугольника: $result";
    }
}