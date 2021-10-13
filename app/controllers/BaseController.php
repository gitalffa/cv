<?php

namespace App\Controllers;
use Laminas\Diactoros\Response\HtmlResponse;

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
        return new HtmlResponse($this->TemplateEngine->render($fileName,$data));
    }
}