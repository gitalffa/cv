<?php
namespace App\Controllers;
use App\Models\Project;


class ProjectsController{
    public function getAddProjectAction($request){
        if($request->getMethod() == 'POST'){
            $postData = $request->getParsedBody();
            $project = new Project();
            $project->project =$_POST['project'];
            $project->description =$_POST['description'];
            $project->save();
       } 
       include '../views/addProject.php';
   }
    
}

