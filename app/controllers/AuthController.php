<?php

namespace App\Controllers;
use App\Models\User;


class AuthController extends BaseController{

    public function getLogin(){
        return $this->renderHTML('login.twig');

    }

    public function postLogin($request){
        //var_dump($request);
        $postData = $request->getParsedBody();
        $user = User::Where('email',$postData['email'])->first();
        if($user){
            if(\password_verify($postData['password'],$user->password)){
                echo 'rigth';
            }else{
                echo 'wrong';
            }
        }else{
            echo 'not found';
        }
    }
}