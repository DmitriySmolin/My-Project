<?php

class Sphere extends GeometryFigure
{
    function __construct() {
        $this->$name = 'Сфера';
        $this->pi = 3.14;
        $this->R = 4;
   }

   public function getName(){
       return "Название фигуры: ".$this->$name;
   }

   public function getArea(){
       $result = 4 * $this->pi * $this->R * $this->R;
       return "Площадь сферы: $result";
   }

   public function getPerimeter(){
    pi(); 

        $result = 4/3 * $this->pi * $this->R * $this->R * $this->R ;
      return  "Объем сферы: $result";
   }
}