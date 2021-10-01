<?php

class Job{
    private $title;
    public $description;
    public $visible = true;
    public $months;

    public function __construct($title,$description){
        $this->setTitle($title);
        $this->description = $description;
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

    public function getDurationAsString(){
        $years = floor($this->months/12);
        $extraMonths = $this->months % 12;
        if($years == 0 ){
          return "$extraMonths months";
        }else{
          return "$years years $extraMonths months";
        }
      }
}

$job1 = new Job('PHP Develper','This is an awesome Job!!');
$job1->months = 16;

$job2 = new Job('Python Dev','This is an great awesome Job!!');
$job2->months = 24;

$job3 = new Job('Devops','This is an fabulos awesome Job!!');
$job3->months = 5;

$jobs =[
    $job1,
    $job2,
    $job3
    /*[
       'title' => ,
      'description' => 'This is an awesome Job!!',
      'visible' => true,
      'months' => 16
    ],
    [
      'title' => 'Python Dev',
      'description' => 'This is an great awesome Job!!',
      'visible' => false,
      'months' => 14
    ],
    [
      'title' => 'Devops',
      'description' => 'This is an fabulos awesome Job!!',
      'visible' => true,
      'months' => 5
    ],
    [
      'title' => 'Node Dev',
      'description' => 'This is an fabulos awesome Job!!',
      'visible' => true,
      'months' => 24
    ],
    [
      'title' => 'Frontend Dev',
      'description' => 'This is an fabulos awesome Job!!',
      'visible' => true,
      'months' => 3
    ] */
  ];

  
  
  function printJob($job){
    if($job->visible == false){
      return;
    }
    echo '<li class="work-position">';
    echo '<h5>'.$job->getTitle().'</h5>';
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