<?php

namespace App\Controllers;
use App\Models\{Job,Project};

class AdminController extends BaseController{
    public function getIndex(){
       
       

        //include '../views/index.php';
        return $this->renderHTML('admin.twig');
        
    }
}