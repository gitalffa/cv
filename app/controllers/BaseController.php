<?php

namespace App\Controllers;
class BaseController{
protected $TemplateEngine;

    public function __construct(){
        $loader = new \Twig\Loader\FilesystemLoader('../views');
        $this->TemplateEngine = new \Twig\Environment($loader, [
            'debug' => true,
            'cache' => false,
        ]);
    }

    public function renderHTML($fileName,$data =[]){
        return $this->TemplateEngine->render($fileName,$data);
    }
}