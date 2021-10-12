<?php

namespace App\Controllers;
use App\Models\Job;

class JobsController extends BaseController{
    public function getAddJobAction($request){

       
         if($request->getMethod() == 'POST'){
             $postData = $request->getParsedBody();
            $job = new Job();
            $job->title =$_POST['title'];
            $job->description =$_POST['description'];
            $job->save();
        } 
        
        echo $this->renderHTML('addJob.twig');
        //include '../views/addJob.php';
    }
}