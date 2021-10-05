<?php

namespace App\Models;


class BaseElement implements Printable{
    
    protected $title;
    public $description;
    public $visible = true;
    public $months;

    public function __construct($title,$description){
        $this->setTitle($title);
        $this->setDescription($description);
    }

    public function setTitle($title){
        if($title == ''){
            $this->title = 'N/A';
        }else{
            $this->title = $title;
        }
       
    }

    public function getTitle(){
        return $this->title;
    }

    public function setDescription($description){
      if($description == ''){
        $this->description='N/A';
      }else{
          $this->description = $description;
      }
    }

    public function getDurationAsString(){
        $years = floor($this->months/12);
        $extraMonths = $this->months % 12;
        if($years == 0 ){
          return "$extraMonths months";
        }else{
          return "$years years $extraMonths months";
        }
      }

      public function getDescription() {
        return $this->description;
      }
}