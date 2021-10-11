<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

use App\Models\Job;
use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => 'localhost',
    'database' => 'cursophp',
    'username' => 'root',
    'password' => 'p@nt@n@l',
    'charset' => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix' => '',
]);

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

$request = Laminas\Diactoros\ServerRequestFactory::fromGlobals(
    $_SERVER,
    $_GET,
    $_POST,
    $_COOKIE,
    $_FILES
);

$routerContainer = new RouterContainer();
$map = $routerContainer->getMap();
$map->get('index', '/cv/',[
    'controller' => 'App\Controllers\IndexController',
    'action' => 'indexAction'
]);
$map->get('addJobs', '/cv/jobs/add',[
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);
$map->post('saveJobs', '/cv/jobs/add',[
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction'
]);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);

/* aqui vamos a dejar de manera temporal printElement()*/

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


if(!$route){
    echo 'No route';
}else{
    $handlerData = $route->handler;
    $controllerName=$handlerData['controller'];
    $actionName = $handlerData['action'];
    $controller = new $controllerName;
    $controller->$actionName($request);
    //var_dump($route->handler['action']);
}

//var_dump($route->handler);

