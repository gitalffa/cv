<?php

namespace App\Controllers;
use App\Models\{Job,Project};

class IndexController{
    public function indexAction(){
       
        
        $jobs = Job::all();
        $projects = Project::all();
        
        $lastName='Galindo Copado';
        $name = "Fabricio $lastName";
        $limitMonths = 2000;

        include '../views/index.php';

    }
}