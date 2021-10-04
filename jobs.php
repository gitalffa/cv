<?php
require 'app/Models/Job.php';
require 'app/Models/Project.php';
require_once 'app/Models/Printable.php';

require 'lib1/Project.php';

use App\Models\Job;
use App\Models\Project;
use App\Models\Printable;

// use App\Models\{Job, Project, Printable};

$job1 = new Job('PHP Develper','This is an awesome Job!!');
$job1->months = 16;

$job2 = new Job('Python Dev','This is an great awesome Job!!');
$job2->months = 24;

$job3 = new Job('Devops','This is an fabulos awesome Job!!');
$job3->months = 5;

$project1 = new Project('Project 1','Description 1');

$jobs =[
    $job1,
    $job2,
    $job3
    
  ];

  $projects = [
      $project1
  ];

  
  
  function printElement(Printable $job){
    if($job->visible == false){
      return;
    }
    echo '<li class="work-position">';
    echo '<h5>'.$job->getTitle().'</h5>';
    echo '<p>'. $job->getDescription().'</p>';
    echo '<p>'. $job->getDurationAsString().'</p>';
   // echo '<p>'. $totalMonths.'</p>';
    echo '<strong>Achievements:</strong>';
    echo '<ul>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '<li>Lorem ipsum dolor sit amet, 80% consectetuer adipiscing elit.</li>';
    echo '</ul>';
    echo '</li>';
  }