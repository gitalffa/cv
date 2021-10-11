<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


/* use App\Models\Job;
use App\Models\Project;
use App\Models\Printable;  */


  
  
  function printElement( $job){
    /* if($job->visible == false){
      return;
    }  */
    echo '<li class="work-position">';
    echo '<h5>'.$job->title.'</h5>';
    echo '<p>'. $job->description.'</p>';
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