<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once '../vendor/autoload.php';

session_start();

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/..');
$dotenv->load();





use Laminas\Diactoros\Response\RedirectResponse;
use Illuminate\Database\Capsule\Manager as Capsule;
use Aura\Router\RouterContainer;

use App\Models\Job;
use App\Models\Project;

$capsule = new Capsule;

$capsule->addConnection([
    'driver' => 'mysql',
    'host' => $_SERVER['DB_HOST'],
    'database' => $_SERVER['DB_NAME'],
    'username' => $_SERVER['DB_USER'],
    'password' => $_SERVER['DB_PASS'],
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
    'action' => 'getAddJobAction',
    'auth' => true
]);
$map->get('addProjects', '/cv/projects/add',[
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction',
    'auth' => true
]);
$map->get('addUsers', '/cv/users/add',[
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction',
    'auth' => true
]);

$map->get('loginForm', '/cv/login',[
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogin'
]);

$map->get('admin', '/cv/admin',[
    'controller' => 'App\Controllers\AdminController',
    'action' => 'getIndex',
    'auth' => true
]);

$map->get('logout', '/cv/logout',[
    'controller' => 'App\Controllers\AuthController',
    'action' => 'getLogout',
    'auth' => true
]);

$map->post('auth', '/cv/auth',[
    'controller' => 'App\Controllers\AuthController',
    'action' => 'postLogin'
]);

$map->post('saveJobs', '/cv/jobs/add',[
    'controller' => 'App\Controllers\JobsController',
    'action' => 'getAddJobAction',
    'auth' => true
]);

$map->post('saveProject', '/cv/projects/add',[
    'controller' => 'App\Controllers\ProjectsController',
    'action' => 'getAddProjectAction',
    'auth' => true
]);
$map->post('saveUser', '/cv/users/add',[
    'controller' => 'App\Controllers\UsersController',
    'action' => 'getAddUserAction',
    'auth' => true
]);


$matcher = $routerContainer->getMatcher();
$route = $matcher->match($request);




if(!$route){
    echo 'No route';
}else{
    $handlerData = $route->handler;
    $controllerName=$handlerData['controller'];
    $actionName = $handlerData['action'];
    $needsAuth = $handlerData['auth'] ?? false;
    
    $sessionUserID = $_SESSION['userId'] ?? null;
    
    if ($needsAuth && !$sessionUserID){
        $controllerName='App\Controllers\AuthController';
        $actionName = 'getProtected';
        $needsAuth = true;
        
    }


    $controller = new $controllerName;
    $response = $controller->$actionName($request);
    //var_dump($controller->$actionName($request));
    /* $métodos_clase = get_class_methods($response);


foreach ($métodos_clase as $nombre_método) {
   echo "$nombre_método\n";
} */
   // var_dump($response->getBody());
    foreach($response->getHeaders() as $name => $values){
        foreach($values as $value ){
            header(sprintf('%s: %s',$name,$value),false);
        }
    }
    http_response_code($response->getStatusCode());
    echo $response->getBody();
 
}

//var_dump($route->handler);

